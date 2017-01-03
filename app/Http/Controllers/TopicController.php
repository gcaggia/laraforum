<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Topic;
use App\Post;

class TopicController extends Controller
{
    public function index(Request $request, $category_slug, $topic_slug)
    {   
        $topic = $topic_slug;
        $category = $category_slug;

        $posts = $topic->posts()->paginate(5);
        $nbPostsBefore = (($request->input('page') ?? 1) - 1) * 5;

        if ($topic) {
            return view('posts', compact('topic', 'category', 
                                         'posts', 'nbPostsBefore'));
        } else {
            abort(404);
        }
        
    }

    public function addPost(Request $request, $category, $topic)
    {
        $topic->addPost(
            new Post(['user_id' => auth()->user()->id,
                      'content' => $request->post,
                     ])
        );

        // $post = new Post();
        // dd($request->all(), auth()->user(), $post, $category, $topic);
        return back();
    }
}
