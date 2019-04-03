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

        // $query = Post::with(['category','tags','owner','photos'])->published();//precarcar las relaciones
        $query = Post::published();

        if (request('month')) {
            $query->whereMonth('published_at',request('month'));
        }
        if (request('year')) {
            $query->whereYear('published_at',request('year'));
        }
        $posts = $query->paginate(5);
        return view('pages.home',compact('posts'));
    }

    public function about()
    {  
        return view('pages.about');
    }

    public function archive()
    {
        \DB::statement("SET lc_time_names = 'es_ES'");//para colocar los resultados de la consulta en espa;ol
        $archivo =Post::published()->byYearAndMonth()->get();

        // $authors = User::take(4)->get();//Le estamos indicando que solo queremos  4 user
        $authors = User::latest()->take(4)->get();//mostramos los ultimos usuarios creados.
        $categories = Category::take(7)->get();
        $posts = Post::latest('published_at')->take(5)->get();
        return view('pages.archive',compact('authors','categories','posts','archivo'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
