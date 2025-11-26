<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $reporter=User::where('role','reporter')->get();
            $pendingpost=Post::where('status','pending')->get();
            $post=Post::all();
            return view('admin.index')->with('post',$post)
            ->with('reporter',$reporter)->with('pendingpost',$pendingpost);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
}
