<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Storage;

class CategoryController extends Controller
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
    public function index()
    {
        $this->authorize('is-admin');
        $categories = Category::all();
        return view('admin.manage-category')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.add-category')->render(),
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
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
            'name' => 'required|max:255',
            'hassubcategory' => 'nullable',
            'showonheader' => 'nullable',
            'showonleftside' => 'nullable',
            'showonfooter' => 'nullable',
            'slug' => 'required|max:255|unique:categories',
            'metatitle' => 'required|max:255',
            'metadescription' => 'required|max:255',
            'metakeyword' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,svg,jpeg,gif|max:2048',
        ]);
        if ($validator->passes()) {
            try {
                $image = "";
                if ($request->hasFile('image')) {
                    $image = $request->image->store("categoryimage");
                }
                Category::create([
                    'name' => $request->name,
                    'hassubcategory' => $request->hassubcategory ?? 'no',
                    'showonheader' => $request->showonheader ?? 'no',
                    'showonfooter' => $request->showonfooter ?? 'no',
                    'show_in_menu' => $request->show_in_menu ?? 'no', // <-- new field
                    'slug' => $request->slug,
                    'metatitle' => $request->metatitle,
                    'metadescription' => $request->metadescription,
                    'metakeyword' => $request->metakeyword,
                    'image' => $image
                ]);

                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Category Created',
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
        //
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
            $this->authorize('is-admin');
            $category = Category::findOrFail($id);
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.edit-category')->with('category', $category)->render(),
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->slug, '-');
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
            'name' => 'required|max:255',
            'hassubcategory' => 'nullable',
            'showonheader' => 'nullable',
            'showonfooter' => 'nullable',
            'showonleftside' => 'nullable',
            "slug" => ["required", Rule::unique('categories')->ignore($id)],
            'metatitle' => 'required|max:255',
            'image' => $category->image ? 'nullable|image|mimes:jpg,png,svg,jpeg,gif|max:2048' : "required|image|mimes:jpg,png,svg,jpeg,gif|max:2048",
            'metadescription' => 'required|max:255',
            'metakeyword' => 'required|max:255',
        ]);
        if ($validator->passes()) {
            try {
                $category1 = Category::findOrFail($id);
                $image = "";
                if ($request->hasFile('image')) {
                    if ($category1->image && Storage::exists($category1->image)) {
                        Storage::delete($category1->image);
                    }
                    $image = $request->image->store("categoryimage");
                } else {
                    $image = $category1->image;
                }
                Category::where('id', $id)->update([
                    'name' => $request->name,
                    'hassubcategory' => $request->hassubcategory ?? 'no',
                    'showonheader' => $request->showonheader ?? 'no',
                    'showonfooter' => $request->showonfooter ?? 'no',
                    'show_in_menu' => $request->show_in_menu ?? 'no', // <-- new field
                    'slug' => $request->slug,
                    'metatitle' => $request->metatitle,
                    'metadescription' => $request->metadescription,
                    'metakeyword' => $request->metakeyword,
                    'image' => $image
                ]);

                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Category Updated',
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
        } else {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
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
            Category::findOrFail($id);
            Category::where('id', $id)->delete();
            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Category Deleted',
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

    public function changestatus($id, $status)
    {
        try {
            if ($status == 'active') {
                $updatedstatus = 'block';
            } else {
                $updatedstatus = 'active';
            }
            Category::findOrFail($id);
            Category::where('id', $id)->update([
                'status' => $updatedstatus,
            ]);
            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Status Changed',
                'status' => $updatedstatus,
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
}
