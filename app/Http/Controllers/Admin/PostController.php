<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();
        
        # code...
        return View('admin.posts.index',compact('posts'));
    }

    public function verific_admin()
    {
        # code...
        return view('admin.dashboard');
    }

    // public function create()
    // {
    //     # code...
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return View('admin.posts.create',compact('categories','tags'));
    // }

    public function store(Request $request)
    {
        # code...
        $this->validate($request,[
            'title'=> 'required',
        ]);

        $post = Post::create([
            'title' => $request->get('title'),
            'url' => str_slug($request->get('title')), 
            ]);

        return redirect()->route('admin.posts.edit',compact('post'));
    }

    public function edit(Post $post)
    {
        # code...
        $categories = Category::all();
        $tags = Tag::all();

        return View('admin.posts.edit',compact('categories','tags','post'));
    }

    public function update(Post $post ,Request $request)
    {
        # code...
        $this->validate($request,[
            'title'=> 'required',
            'body'=>'required',
            'category'=>'required',
            'tags'=> 'required',
            'excerpt'=>'required',
        ]);

        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->iframe = $request->get('iframe');
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = is_null($request->published_at) ? null : Carbon::parse($request->get('published_at'));
        // $post->category_id = $request->get('category');
        $post->category_id = Category::find($cat = $request->get('category'))
                             ? $cat : Category::create(['name' => $cat])->id;

        
        $tags=[];
            foreach ($request->get('tags') as $tag) {
                # code...
                $tags[] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag ])->id;
            }
        $post->save();

        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.edit',compact('post'))->with('flash','Tu publicacion ha sido guardada');

        
        
    }

    
}
