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
            $totalPosts = Post::count();
            $totalReporters = User::where('role', 'reporter')->count();
            $pendingPosts = Post::where('status', 'pending')->count();
            $totalViews = Post::sum('views');

            return view('admin.index', compact('totalPosts', 'totalReporters', 'pendingPosts', 'totalViews'));

        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }

}
