<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
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

        $post = Post::create(['title' => $request->get('title')]);

        return redirect()->route('admin.posts.edit',compact('post'));
    }

    public function edit(Post $post)
    {
        # code...
        $categories = Category::all();
        $tags = Tag::all();

        return View('admin.posts.edit',compact('categories','tags','post'));
    }

    public function update(Post $post ,StorePostRequest $request)
    {
       
        // return $request;
        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit',compact('post'))
        ->with('flash','La publicacion ha sido guardada');
        

        // $tags=[];
        //     foreach ($request->get('tags') as $tag) {
        //         # code...
        //         $tags[] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag ])->id;
        //     }

        


        
        
    }

    public function destroy(Post $post)
    {
        /*
        **	@Revisar el model Post para ver todos la logica de eliminacion 
        */
        
        

        

        $post->delete();

        return redirect()->route('admin.posts.index')
        ->with('flash','La publicacion ha sido elimida');
    }
    
}
