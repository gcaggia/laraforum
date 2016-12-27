<?php

namespace LaraForum\Http\Controllers;

use Illuminate\Http\Request;
use LaraForum\Http\Requests;
use LaraForum\Topic;

class TopicController extends Controller
{
    public function index($pctagory, $topic_slug)
    {   
        $topic = $topic_slug;

        if ($topic) {
            return view('posts', compact('topic'));
        } else {
            abort(404);
        }
        
    }
}
