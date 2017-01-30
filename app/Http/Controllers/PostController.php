<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function getAjaxPost($id)
    {
        $post = Post::find($id)->load('user');
        
        return response()->json([
            'message' => $post->content,
            'user'    => $post->user->name,
        ]);
    }
}
