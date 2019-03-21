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
        // $posts = Post::all();
        // $posts = Post::where('user_id',auth()->id())->get();

        // $posts = auth()->user()->posts;//veriamos solo los posts que nos petenecen
        // validar par que el administrador pueda ver todos los post
        $posts = Post::allowed()->get();
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
        $this->authorize('create', new Post);
        $this->validate($request,[
            'title'=> 'required | min:3',
        ]);

        // $post = Post::create(['title' => $request->get('title')]);
        $post = Post::create([
            'title' => $request->get('title'),
            'user_id' => auth()->id() 
            ]);

        return redirect()->route('admin.posts.edit',compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update',$post);

        $categories = Category::all();
        $tags = Tag::all();

        return View('admin.posts.edit',compact('categories','tags','post'));
    }

    public function update(Post $post ,StorePostRequest $request)
    {
        $this->authorize('update',$post);
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
        $this->authorize('delete',$post);

        $post->delete();

        return redirect()->route('admin.posts.index')
        ->with('flash','La publicacion ha sido elimida');
    }
    
}
