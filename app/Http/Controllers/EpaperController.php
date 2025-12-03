<?php

namespace App\Http\Controllers;

use App\Epaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class EpaperController extends Controller
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
        $epapers = Epaper::latest()->get();
        return view('admin.manage-epaper')->with('epapers', $epapers);
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
                "html" => view('admin.ajax.add-epaper')->render(),
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
        $request->validate([
            'title' => 'required|max:255',
            'file' => 'required|mimetypes:application/pdf',
            'date' => 'required',
            'image' => 'nullable|image:mimes,jpg,png,jpeg,svg',
        ]);

        try {
            $data = [
                'title' => $request->title,
                'file' => $request->file->store('epapers'),
                'date' => $request->date,
            ];

            // OPTIMIZE IMAGE (NEW)
            if ($request->hasFile('image')) {
                $data['image'] = $request->image->store('epapersimage');
                $imagehash = $request->image->hashName();
                $path = storage_path('app/public/epapersimage/' . $imagehash);

                // OPTIMIZE ONLY (50-70% smaller, original dimensions)
                $optimizerChain = OptimizerChainFactory::create();
                $optimizerChain->optimize($path);
            }


            Epaper::create($data);
            return redirect(route('manage-epaper.index'))->with('success', 'Add SuccessFull');
        } catch (\Exception $ex) {
            return redirect(route('manage-epaper.index'))->with('error', 'Error Encountered ' . $ex->getMessage());
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
            $epaper = Epaper::findOrFail($id);
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.edit-epaper')->with('epaper', $epaper)->render(),
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
        $request->validate([
            'title' => 'required|max:255',
            'file' => 'nullable|mimetypes:application/pdf',
            'date' => 'required',
            'image' => 'nullable|image:mimes,jpg,png,jpef,svg'
        ]);
        try {
            $epaper = Epaper::findOrFail($id);
            $data = array(
                'title' => $request->title,
                'date' => $request->date,
            );
            if ($request->hasFile('file')) {
                $data['file'] = $request->file->store('epapers');
                if (isset($epaper->file) && Storage::exists($epaper->file)) {
                    Storage::delete($request->file);
                }
            }
            if ($request->hasFile('image')) {
                $data['image'] = $request->image->store('epapersimage');

                // Delete old image
                if (isset($epaper->image) && Storage::exists($epaper->image)) {
                    Storage::delete($epaper->image);
                }

                $imagehash = $request->image->hashName();
                $path = storage_path('app/public/epapersimage/' . $imagehash);

                // OPTIMIZE ONLY
                $optimizerChain = OptimizerChainFactory::create();
                $optimizerChain->optimize($path);
            }

            Epaper::where('id', $id)->update($data);
            return redirect(route('manage-epaper.index'))->with('success', 'Update SuccessFull');
        } catch (\Exception $ex) {
            return redirect(route('manage-epaper.index'))->with('error', 'Error Encountered ' . $ex->getMessage());
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
            $epaper = Epaper::findOrFail($id);
            if (isset($epaper->image) && Storage::exists($epaper->image)) {
                Storage::delete($epaper->image);  // ✅ FIXED: was $request->image
            }
            if (isset($epaper->file) && Storage::exists($epaper->file)) {
                Storage::delete($epaper->file);   // ✅ FIXED: was $request->file
            }
            Epaper::where('id', $id)->delete();
            return redirect(route('manage-epaper.index'))->with('success', 'Deleted SuccessFull');
        } catch (\Exception $ex) {
            return redirect(route('manage-epaper.index'))->with('error', 'Error Encountered ' . $ex->getMessage());
        }
    }


    public function changestatus($id)
    {
        try {
            $epaper = Epaper::findOrFail($id);
            if ($epaper->status == 'active') {
                $data = array(
                    'status' => 'block'
                );
            } else {
                $data = array(
                    'status' => 'active'
                );
            }
            Epaper::where('id', $id)->update($data);
            return redirect(route('manage-epaper.index'))->with('success', 'Update SuccessFull');
        } catch (\Exception $ex) {
            return redirect(route('manage-epaper.index'))->with('error', 'Error Encountered ' . $ex->getMessage());
        }
    }
}
