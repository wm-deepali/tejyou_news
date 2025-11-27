<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubSubcategory;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SubSubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List all sub-subcategories.
     */
    public function index()
    {
        $this->authorize('is-admin');
        $subsubcategories = SubSubcategory::with('subcategory')->get();

        return view('admin.manage-sub-subcategory')
            ->with('subsubcategories', $subsubcategories);
    }

    /**
     * Show add form (AJAX modal).
     */
    public function create()
    {
        try {
            $categories = Category::where('hassubcategory', 'yes')->get();
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.add-sub-subcategory')
                    ->with('categories', $categories)
                    ->render(),
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Store Sub-Subcategory
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->slug, '-');
        $request->replace($requestData);

        $validator = Validator::make($requestData, [

            'subcategory_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:sub_subcategories',
            'metatitle' => 'required|max:255',
            'metadescription' => 'required|max:255',
            'metakeyword' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }

        try {
            SubSubcategory::create([
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
                'metakeyword' => $request->metakeyword,
            ]);

            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Sub-Subcategory Created',
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        try {
            $this->authorize('is-admin');
            $subsubcategory = SubSubcategory::findOrFail($id);
            $subcategories = Subcategory::all();
            $categories = Category::where('hassubcategory', 'yes')->get();
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.edit-sub-subcategory')
                    ->with('subsubcategory', $subsubcategory)
                    ->with('subcategories', $subcategories)
                     ->with('categories', $categories)
                    ->render(),
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => "Data Not found by id#" . $id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->slug, '-');
        $request->replace($requestData);

        $validator = Validator::make($requestData, [
            'subcategory_id' => 'required',
            'name' => 'required|max:255',
            'slug' => [
                'required',
                Rule::unique('sub_subcategories')->ignore($id),
            ],
            'metatitle' => 'required|max:255',
            'metadescription' => 'required|max:255',
            'metakeyword' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }

        try {
            SubSubcategory::findOrFail($id);

            SubSubcategory::where('id', $id)->update([
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
                'metakeyword' => $request->metakeyword,
            ]);

            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Sub-Subcategory Updated',
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => "Data Not found by id#" . $id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Destroy
     */
    public function destroy($id)
    {
        try {
            SubSubcategory::findOrFail($id);
            SubSubcategory::where('id', $id)->delete();

            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Sub-Subcategory Deleted',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => "Data Not found by id#" . $id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Toggle Status
     */
    public function changestatus($id, $status)
    {
        try {
            $newStatus = ($status == 'active') ? 'block' : 'active';

            SubSubcategory::findOrFail($id);
            SubSubcategory::where('id', $id)->update([
                'status' => $newStatus,
            ]);

            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Status Changed',
                'status' => $newStatus,
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => "Data Not found by id#" . $id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }
}
