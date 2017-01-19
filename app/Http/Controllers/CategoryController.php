<?php

namespace App\Http\Controllers;

use App\Category;
use App\Topic;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoryController extends Controller
{
    private $nbPaginate = 5;

    public function index($category_slug)
    {   

        $category = $category_slug;

        $topics = $category->topics()->paginate($this->nbPaginate);
        
        if ($category) {
            return view('category', compact('category', 'topics'));
        } else {
            abort(404);
        }
        
    }

    public function newTopic($category_slug)
    {   
        $category = $category_slug;

        return view('postNew', compact('category'));
    }

    public function addTopic(Request $request, $category)
    {
        // dd($request);

        $this->validate($request, [
            'title'   => 'required|min:5|max:255|unique:topics',
            'content' => 'required|min:5'
        ]);

        $topic = $category->addTopic(
            new Topic([ 'user_id'    => auth()->user()->id,
                        'topic_slug' => str_slug($request->title),
                        'title'      => $request->title,
                      ])
        );

        $result = $topic->addPost(
            new Post(['user_id' => auth()->user()->id,
                      'content' => $request->content,
                     ])
        );

        return redirect($category->slug . '/' .  $topic->topic_slug)
                        ->with('Topic', 'New');


    }
}
