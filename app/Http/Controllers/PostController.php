<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Postcategory;
use App\Postsubcategory;
use App\Postsubsubcategory;
use App\Posttag;
use App\Subcategory;
use App\SubSubcategory;
use App\Tag;
use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        if (Auth::user()->role == 'admin') {
            $reporters = User::where('role', 'reporter')->get();
            if ($request->ajax()) {
                $posts = Post::when($request->category, function ($query, $category) {
                    $query->whereHas('categories', function (Builder $query1) use ($category) {
                        $query1->where('category_id', $category);
                    });
                })->when($request->status, function ($query2, $status) {
                    $query2->where('status', $status);
                })->when($request->datefrom, function ($query3, $datefrom) {
                    $query3->whereDate('created_at', '>=', $datefrom);
                })->when($request->dateto, function ($query4, $dateto) {
                    $query4->whereDate('created_at', '<=', $dateto);
                })->when($request->user, function ($query5, $user) {
                    $query5->where('user_id', $user);
                })->orderBy('id', 'desc')->paginate(10);
                return view('admin.ajax.manage-post')->with('posts', $posts)->with('categories', $categories);
            } else {
                $posts = Post::orderBy('id', 'desc')->paginate(10);
            }
        } else {
            $reporters = User::where('id', Auth::user()->id)->where('role', 'reporter')->get();
            if ($request->ajax()) {
                $posts = Post::where('user_id', Auth::user()->id)->when($request->category, function ($query, $category) {
                    $query->whereHas('categories', function (Builder $query1) use ($category) {
                        $query1->where('category_id', $category);
                    });
                })->when($request->status, function ($query2, $status) {
                    $query2->where('status', $status);
                })->orderBy('id', 'desc')->paginate(10);
                return view('admin.ajax.manage-post')->with('posts', $posts)->with('categories', $categories);
            } else {
                $posts = Post::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
            }
        }
        return view('admin.manage-post')->with('posts', $posts)->with('categories', $categories)->with('reporters', $reporters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        // $posts=Post::whereNotNull('image')->get();
        return view('admin.add-post')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->slug, '-');
        $request->replace($requestData);

        $validator = Validator::make($requestData, [
            'title' => 'required',
            'slug' => 'required|max:255|unique:posts',
            'content' => 'nullable|string',
            'video' => 'nullable|regex:/^[a-zA-Z0-9_-]{11}$/',
            'metatitle' => 'required|max:70',
            'metadescription' => 'required|max:160',
            'metakeyword' => 'required|max:255',
            'category' => 'required',
            'subcategory' => 'nullable',
            'subsubcategory' => 'nullable', // added
            'tag' => 'required',
            'image' => 'nullable|image',
            'imagename' => 'nullable',
            'imagetag' => 'nullable'
        ]);

        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $data = [
                    'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'content' => $request->content,
                    'video' => $request->video,
                    'metatitle' => $request->metatitle,
                    'metadescription' => $request->metadescription,
                    'metakeyword' => $request->metakeyword,
                ];

                if ($request->hasFile('image')) {
                    $data['image'] = $request->image->store('posts');
                    $data['imagetag'] = $request->imagetag;
                    $imagehash = $request->image->hashName();
                    $path = storage_path('app/public/posts/' . $imagehash);
                    Image::make($request->image)->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($path);
                } elseif ($request->filled('imagename')) {
                    $data['image'] = $request->imagename;
                }

                if (Auth::user()->role == 'admin') {
                    $data['status'] = 'published';
                    $data['approvedby_id'] = Auth::user()->id;
                } else {
                    $data['status'] = 'pending';
                }

                $post = Post::create($data);

                $postnumber = 'PN' . str_pad($post->id, 5, "0", STR_PAD_LEFT);
                $post->update(['postnumber' => $postnumber]);

                // Categories
                foreach (explode(',', $request->category) as $category_id) {
                    Postcategory::create([
                        'post_id' => $post->id,
                        'category_id' => $category_id,
                    ]);
                }

                // Subcategories
                if (!empty($request->subcategory)) {
                    foreach (explode(',', $request->subcategory) as $subcategory_id) {
                        Postsubcategory::create([
                            'post_id' => $post->id,
                            'subcategory_id' => $subcategory_id,
                        ]);
                    }
                }

                // Sub-Subcategories
                if (!empty($request->subsubcategory)) {
                    foreach (explode(',', $request->subsubcategory) as $subsubcategory_id) {
                        Postsubsubcategory::create([   // make sure this model exists
                            'post_id' => $post->id,
                            'subsubcategory_id' => $subsubcategory_id,
                        ]);
                    }
                }

                // Tags
                foreach (explode(',', $request->tag) as $tag_id) {
                    Posttag::create([
                        'post_id' => $post->id,
                        'tag_id' => $tag_id,
                    ]);
                }

                DB::commit();
                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Post Created',
                ]);
            } catch (\Exception $ex) {
                DB::rollback();
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            DB::rollback();
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.preview-post')->with('post', $post)->render(),
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $post = Post::findOrFail($id);

            $categories = Category::all();
            $subcategories = Subcategory::whereIn('category_id', $post->getCategoryIds())->get();
            $subsubcategories = Subsubcategory::whereIn('subcategory_id', $post->getSubcategoryIds())->get();

            $tags = Tag::all();

            $postcategoryids = Postcategory::where('post_id', $post->id)->pluck('category_id')->toArray();
            $postsubcategoryids = Postsubcategory::where('post_id', $post->id)->pluck('subcategory_id')->toArray();
            $postsubsubcategoryids = Postsubsubcategory::where('post_id', $post->id)->pluck('subsubcategory_id')->toArray();
            $posttagids = Posttag::where('post_id', $post->id)->pluck('tag_id')->toArray();

            return view('admin.edit-post', compact(
                'post',
                'categories',
                'subcategories',
                'subsubcategories',
                'tags',
                'postcategoryids',
                'postsubcategoryids',
                'postsubsubcategoryids',
                'posttagids'
            ));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return redirect()->route('manage-post.index')->with('error', "Data not found by ID #$id");
        } catch (\Exception $ex) {
            return redirect()->route('manage-post.index')->with('error', "Error encountered: " . $ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->slug, '-');
        $request->replace($requestData);

        $validator = Validator::make($requestData, [
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts')->ignore($id)],
            'content' => 'required',
            'video' => 'nullable|regex:/^[a-zA-Z0-9_-]{11}$/',
            'metatitle' => 'required|max:70',
            'metadescription' => 'required|max:160',
            'metakeyword' => 'required|max:255',
            'category' => 'required',
            'subcategory' => 'nullable',
            'subsubcategory' => 'nullable',
            'tag' => 'required',
            'image' => 'nullable|image',
            'imagename' => 'nullable',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();
        try {
            $post = Post::findOrFail($id);

            $data = $request->only(['title', 'slug', 'content', 'video', 'metatitle', 'metadescription', 'metakeyword']);

            // Handle image upload or selection
            if ($request->hasFile('image')) {
                $data['image'] = $request->image->store('posts');

                if ($post->image && Storage::exists($post->image)) {
                    Storage::delete($post->image);
                }

                $imagehash = $request->image->hashName();
                $path = storage_path('app/public/posts/' . $imagehash);
                Image::make($request->image)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);
            } elseif ($request->filled('imagename')) {
                $data['image'] = $request->imagename;
            }

            $post->update($data);

            // Sync relationships instead of deleting all
            $post->categories()->sync($request->category ? explode(',', $request->category) : []);
            $post->subcategories()->sync($request->subcategory ? explode(',', $request->subcategory) : []);
            $post->subsubcategories()->sync($request->subsubcategory ? explode(',', $request->subsubcategory) : []);
            $post->tags()->sync($request->tag ? explode(',', $request->tag) : []);

            DB::commit();

            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Post Updated',
            ]);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            if (isset($post->image) && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }
            Postsubcategory::where('post_id', $post->id)->delete();
            Postcategory::where('post_id', $post->id)->delete();
            Postsubsubcategory::where('post_id', $post->id)->delete();
            Post::where('id', $id)->delete();
            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Post Deleted',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'Data Not found by id#' . $id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    public function fetchsubcategorybycategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'required|array',
        ]);
        if ($validator->passes()) {
            try {
                $subcategories = Subcategory::whereIn('category_id', $request->categories)->get();
                return response()->json([
                    "msgCode" => "200",
                    "html" => view('admin.ajax.subcategory-option')->with('subcategories', $subcategories)->render(),
                ]);
            } catch (\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode' => '401',
                'msgText' => $validator->errors()->all(),
            ]);
        }
    }

    public function fetchSubSubcategoryBySubcategory(Request $request)
    {
        $subcategories = $request->subcategories;

        if (empty($subcategories)) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'No subcategories selected'
            ]);
        }

        $subsubcategories = SubSubcategory::whereIn('subcategory_id', $subcategories)->get();

        $html = '';
        foreach ($subsubcategories as $subsubcat) {
            $html .= '<li>
                    <label>
                        <input type="checkbox" class="subsubcategory" name="subsubcategory[]" value="' . $subsubcat->id . '"> ' . $subsubcat->name . '
                    </label>
                  </li>';
        }

        return response()->json([
            'msgCode' => '200',
            'html' => $html
        ]);
    }

    public function changestatus($id, $status)
    {
        try {
            if ($status == 'pending') {
                $updatedstatus = 'draft';
            } else {
                $updatedstatus = 'pending';
            }
            Post::findOrFail($id);
            Post::where('id', $id)->update([
                'status' => $updatedstatus,
            ]);
            $data = array(
                'msgCode' => '200',
                'msgText' => 'Status Changed',
                'status' => $updatedstatus,
                'role' => Auth::user()->role,
            );
            if ($updatedstatus == 'pending' && Auth::user()->role == 'admin') {
                $data['li'] = '<li><a href="javascript:void(0)" class="publish-post" postid="' . $id . '" title="Approve and Publish Post"><i class="fas fa-check"></i></a></li>';
            }
            return response()->json($data);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'Data Not found by id#' . $id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    public function viewuserinfo($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.reporter-info')->with('user', $user)->render(),
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    public function publishpost(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            Post::where('id', $id)->update([
                'status' => 'published',
                'approvedby_id' => Auth::user()->id,
                'created_at' => now(),
            ]);
            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Post Approved and Published',
                'approvedby' => Auth::user()->name,
                'status' => 'published',
                'url' => view('admin.ajax.post-url')->with('post', $post)->render(),
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'Data Not found by id#' . $id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    public function createposturl(Request $request)
    {
        try {
            return response()->json([
                'slug' => Str::slug($request->slug, '-'),
                'msgCode' => '200',
                'msgText' => 'Post Created',
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    public function addpostdraft(Request $request)
    {
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->slug, '-');
        $request->replace($requestData);

        $validator = Validator::make($requestData, [
            'title' => 'required',
            'slug' => 'required|max:255|unique:posts',
            'content' => 'nullable|string',
            'video' => 'nullable|max:255',
            'metatitle' => 'nullable|max:70',
            'metadescription' => 'nullable|max:160',
            'metakeyword' => 'nullable|max:255',
            'category' => 'nullable',
            'subcategory' => 'nullable',
            'subsubcategory' => 'nullable', // added
            'tag' => 'nullable',
            'image' => 'nullable|image',
            'imagename' => 'nullable',
            'imagetag' => 'nullable',
        ]);

        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $data = [
                    'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'content' => $request->content,
                    'video' => $request->video,
                    'metatitle' => $request->metatitle,
                    'metadescription' => $request->metadescription,
                    'metakeyword' => $request->metakeyword,
                    'status' => 'draft'
                ];

                if ($request->hasFile('image')) {
                    $data['image'] = $request->image->store('posts');
                    $data['imagetag'] = $request->imagetag;
                    $imagehash = $request->image->hashName();
                    $path = storage_path('app/public/posts/' . $imagehash);
                    Image::make($request->image)->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($path);
                } elseif ($request->filled('imagename')) {
                    $data['image'] = $request->imagename;
                }

                $post = Post::create($data);

                $postnumber = 'PN' . str_pad($post->id, 5, "0", STR_PAD_LEFT);
                $post->update(['postnumber' => $postnumber]);

                // Categories
                if (!empty($request->category)) {
                    foreach (explode(',', $request->category) as $category_id) {
                        Postcategory::create([
                            'post_id' => $post->id,
                            'category_id' => $category_id,
                        ]);
                    }
                }

                // Subcategories
                if (!empty($request->subcategory)) {
                    foreach (explode(',', $request->subcategory) as $subcategory_id) {
                        Postsubcategory::create([
                            'post_id' => $post->id,
                            'subcategory_id' => $subcategory_id,
                        ]);
                    }
                }

                // Sub-subcategories
                if (!empty($request->subsubcategory)) {
                    foreach (explode(',', $request->subsubcategory) as $subsubcategory_id) {
                        Postsubsubcategory::create([   // make sure this model exists
                            'post_id' => $post->id,
                            'subsubcategory_id' => $subsubcategory_id,
                        ]);
                    }
                }

                // Tags
                if (!empty($request->tag)) {
                    foreach (explode(',', $request->tag) as $tag_id) {
                        Posttag::create([
                            'post_id' => $post->id,
                            'tag_id' => $tag_id,
                        ]);
                    }
                }

                DB::commit();
                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Post Saved As Draft',
                ]);
            } catch (\Exception $ex) {
                DB::rollback();
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            DB::rollback();
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }
    }


    public function updatepostdraft(Request $request, $id)
    {
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->slug, '-');
        $request->replace($requestData);

        $validator = Validator::make($requestData, [
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts')->ignore($id)],
            'content' => 'nullable',
            'video' => 'nullable|max:255',
            'metatitle' => 'nullable|max:70',
            'metadescription' => 'nullable|max:160',
            'metakeyword' => 'nullable|max:255',
            'category' => 'nullable',
            'subcategory' => 'nullable',
            'subsubcategory' => 'nullable',
            'tag' => 'nullable',
            'image' => 'nullable|image',
            'imagename' => 'nullable',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();
        try {
            $post = Post::findOrFail($id);

            $data = $request->only([
                'title',
                'slug',
                'content',
                'video',
                'metatitle',
                'metadescription',
                'metakeyword'
            ]);
            $data['status'] = 'draft';

            // Handle image upload or selection
            if ($request->hasFile('image')) {
                $data['image'] = $request->image->store('posts');

                if ($post->image && Storage::exists($post->image)) {
                    Storage::delete($post->image);
                }

                $imagehash = $request->image->hashName();
                $path = storage_path('app/public/posts/' . $imagehash);
                Image::make($request->image)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);
            } elseif ($request->filled('imagename')) {
                $data['image'] = $request->imagename;
            }

            $post->update($data);

            // Sync relationships instead of deleting all
            $post->categories()->sync($request->category ? explode(',', $request->category) : []);
            $post->subcategories()->sync($request->subcategory ? explode(',', $request->subcategory) : []);
            $post->subsubcategories()->sync($request->subsubcategory ? explode(',', $request->subsubcategory) : []);
            $post->tags()->sync($request->tag ? explode(',', $request->tag) : []);

            DB::commit();

            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Post Updated and saved as draft',
            ]);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }


    public function fetchsubcategories($id)
    {
        try {
            $subcategories = Subcategory::where('category_id', $id)->get();
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.subcategory-options')->with('subcategories', $subcategories)->render(),
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'Data Not found by id#' . $id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }


    public function managereport(Request $request)
    {
        $categories = Category::all();
        $reporters = User::where('role', 'reporter')->get();
        $pendingposts = Post::where('status', 'pending')->get();
        $publishedposts = Post::where('status', 'published')->get();
        $totalposts = Post::orderBy('id', 'desc')->get();
        if ($request->ajax()) {
            $posts = Post::when($request->category, function ($query, $category) {
                $query->whereHas('categories', function (Builder $query) use ($category) {
                    $query->where('category_id', $category);
                });
            })->when($request->subcategory, function ($query1, $subcategory) {
                $query1->whereHas('subcategories', function (Builder $query) use ($subcategory) {
                    $query->where('subcategory_id', $subcategory);
                });
            })->when($request->reporter, function ($query2, $reporter) {
                $query2->where('user_id', $reporter);
            })->orderBy('id', 'desc')->paginate(10);
            return view('admin.ajax.manage-reports')->with('categories', $categories)->with('reporters', $reporters)->with('posts', $posts)->with('pendingposts', $pendingposts)->with('publishedposts', $publishedposts);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }
        return view('admin.manage-reports')->with('categories', $categories)->with('reporters', $reporters)->with('posts', $posts)->with('pendingposts', $pendingposts)->with('publishedposts', $publishedposts)->with('totalposts', $totalposts);
    }

    public function searchimagebytag(Request $request)
    {
        try {
            $posts = Post::whereNotNull('image')->where('imagetag', 'like', '%' . $request->search . '%')->take(4)->get();
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.search-image')->with('posts', $posts)->render(),
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    public function generatereport(Request $request)
    {
        $data = array(
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'reporter' => $request->reporter
        );
        return Excel::download(new PostsExport($data), 'posts.xlsx');
    }
}