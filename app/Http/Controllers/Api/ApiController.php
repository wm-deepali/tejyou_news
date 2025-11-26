<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SiteIntro;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    public function intro()
    {
        $url = env('APP_URL').'/storage/intro/';
        $data = SiteIntro::select("site_intro.id", "site_intro.heading", "site_intro.short_description",DB::raw("CONCAT('".$url."', site_intro.image) as image"))
        ->orderBy('id', 'desc')
        ->take(3)->get();            
        return response()->json(['status'=>true, 'message' => 'Introduction', 'data'=>$data]);
    }
    

   
    
}