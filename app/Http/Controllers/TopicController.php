<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Topic;

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
}
