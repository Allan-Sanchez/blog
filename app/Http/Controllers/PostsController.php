<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function show(Post $post)
    {
        // $post = Post::findOrfail($id);

        if ($post->isPublished() || auth()->check()){
            return View('posts.show',compact('post'));
        }
        abort(404);
    }
}
