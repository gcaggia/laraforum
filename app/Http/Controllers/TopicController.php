<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Topic;

class TopicController extends Controller
{
    public function index($pctagory, $ptopic)
    {	
    	
    	$topic = Topic::where('id', $ptopic)->first();
    	
    	if ($topic) {
    		return view('posts', compact('topic'));
    	} else {
    		abort(404);
    	}
    	
    }
}
