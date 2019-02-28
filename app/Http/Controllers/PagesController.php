<?php

namespace App\Http\Controllers;

use App\Post;
// use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //


    public function home()
    {
        # code...
        // $posts = Post::whereNotNull('published_at')
        //                     ->where('published_at','<=',Carbon::now())
        //                     ->latest('published_at')
        //                     ->get();
        $posts = Post::published()->paginate(5);
        return view('welcome',compact('posts'));
    }
}
