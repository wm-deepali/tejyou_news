<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ReporterController extends Controller
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
        $user=User::where('role','reporter')->get();
        return view('admin.manage-reporter')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is-admin');
        $states=State::where('country_id','101')->get();
        return response()->json([
            "msgCode" => "200",
            "html" => view('admin.ajax.add-reporter')->with('states',$states)->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required|image|max:1024',
            'email' => 'required|email|unique:users',
            'contact' => 'required|digits:10|unique:users',
            'state' => 'required|integer',
            'city' => 'required|integer',
            'address' => 'required',
            'cv' => 'nullable|mimes:pdf,xls,doc,docx',
        ]);
        if ($validator->passes()) {
            try {
                $data=array(
                    'name'=>$request->name,
                    'image'=>$request->image->store('users'),
                    'email'=>$request->email,
                    'contact'=>$request->contact,
                    'password'=>Hash::make($request->password),
                    'state_id'=>$request->state,
                    'city_id'=>$request->city,
                    'address'=>$request->address,
                    'role' => 'reporter',
                    'permission' => Null,
                    'status' => 'pending'
                );
                if($request->hasFile('cv')){
                    $data['cv']=$request->cv->store('users');
                }
                $user=User::create($data);
                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Reporter Created',
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode'=>'401',
                'errors'=>$validator->errors(),
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
        try{
            $this->authorize('is-admin');
            $user=User::where('id',$id)->where('role','reporter')->firstOrFail();
            $states=State::where('country_id','101')->get();
            $cities=City::where('state_id',$user->state_id)->get();
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.edit-reporter')->with('user',$user)->with('states',$states)->with('cities',$cities)->render(),
            ]);
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex){
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'Data Not found by id#' . $id,
            ]);
        }
        catch(\Exception $ex){
            return response()->json([
                'msgCode' => '400',
                'msgText' =>$ex->getMessage(),
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'nullable|image',
            'cv' => 'nullable|mimes:pdf,xls,doc,docx',
            "email"=>["required",Rule::unique('users')->ignore($id),"email"],
            "contact"=>["required",Rule::unique('users')->ignore($id),"digits:10"],
            'state' => 'required|integer',
            'city' => 'required|integer',
            'address' => 'required',
        ]);
        if ($validator->passes()) {
            try {
                $user=User::where('id',$id)->where('role','reporter')->firstOrFail();
                $data=array(
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'contact'=>$request->contact,
                    'state_id'=>$request->state,
                    'city_id'=>$request->city,
                    'address'=>$request->address,
                );
                if($request->hasFile('image')){
                    $data['image'] = $request->image->store('users');
                    Storage::delete($user->image);
                }
                if($request->hasFile('cv')){
                    $data['cv'] = $request->cv->store('users');
                    Storage::delete($user->cv);
                }
                User::where('id',$id)->update($data);
                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Reporter Updated',
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode'=>'401',
                'errors'=>$validator->errors(),
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
        try{
            $user=User::where('id',$id)->where('role','reporter')->firstOrFail();
            User::where('id',$id)->delete();
            Storage::delete($user->image);
            Post::where('user_id',$id)->update([
                'user_id'=>Auth::user()->id,
                ]);
            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Reporter Deleted',
            ]);
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex){
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'Data Not found by id#' . $id,
            ]);
        }
        catch(\Exception $ex){
            return response()->json([
                'msgCode' => '400',
                'msgText' =>$ex->getMessage(),
            ]);
        }
    }

    public function approve($id)
    {
        try {
            $user=User::where('id',$id)->where('role','reporter')->firstOrFail();
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.approve-reporter')->with('user',$user)->render(),
            ]);
            // $updatedstatus='approved';
            // $user_number='RP'.str_pad($user->id, 3, "0", STR_PAD_LEFT);
            // User::where('id',$id)->update([
            //     'status'=>$updatedstatus,
            //     'user_number' => $user_number,
            // ]);
            // return response()->json([
            //     'msgCode' => '200',
            //     'msgText' => 'Status Changed',
            //     'status' => $updatedstatus,
            //     'user_number' => $user_number,
            // ]);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'Data Not found by id#' . $id,
            ]);
        } catch(\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }

    public function approvesubmit(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);
        if ($validator->passes()) {
            try {
                $user=User::where('id',$id)->where('role','reporter')->firstOrFail();
                $updatedstatus='approved';
                $user_number='RP'.str_pad($user->id, 3, "0", STR_PAD_LEFT);
                User::where('id',$id)->update([
                    'status'=>$updatedstatus,
                    'user_number' => $user_number,
                ]);
                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Status Changed',
                    'status' => $updatedstatus,
                    'user_number' => $user_number,
                ]);
            } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => 'Data Not found by id#' . $id,
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode'=>'401',
                'errors'=>$validator->errors(),
            ]);
        }
    }

    public function editpassword($id)
    {
        try{
            $user=User::where('id',$id)->where('role','reporter')->firstOrFail();
            return response()->json([
                "msgCode" => "200",
                "html" => view('admin.ajax.change-password-reporter')->with('user',$user)->render(),
            ]);
        }
        catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex){
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'Data Not found by id#' . $id,
            ]);
        }
        catch(\Exception $ex){
            return response()->json([
                'msgCode' => '400',
                'msgText' =>$ex->getMessage(),
            ]);
        }
    }

    public function updatepassword(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);
        if ($validator->passes()) {
            try {
                User::where('id',$id)->where('role','reporter')->firstOrFail();
                User::where('id',$id)->update([
                    'password'=>Hash::make($request->password),
                ]);
                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Password updated',
                ]);
            } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => 'Data Not found by id#' . $id,
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode'=>'401',
                'errors'=>$validator->errors(),
            ]);
        }
    }
}
