<?php

namespace App\Http\Controllers;

use App\Post;
// use Carbon\Carbon;
use App\User;
use App\Category;
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
        return view('pages.home',compact('posts'));
    }

    public function about()
    {  
        return view('pages.about');
    }

    public function archive()
    {
        $archivo = Post::selectRaw('year(published_at) as year')
                    ->selectRaw('monthname(published_at) as month')
                    ->selectRaw('count(*) as posts')
                    ->groupBy('year','month')
                    // ->orderBY('published_at','ASC')
                    ->get();

        // $authors = User::take(4)->get();//Le estamos indicando que solo queresmo a 4 user
        $authors = User::latest()->take(4)->get();//mostramos los ultimos usuarios creados.
        $categories = Category::take(7)->get();
        $posts = Post::latest()->take(5)->get();
        return view('pages.archive',compact('authors','categories','posts','archivo'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
