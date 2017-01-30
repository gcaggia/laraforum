<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Topic;
use App\Post;

class TopicController extends Controller
{
    private $nbPaginate = 5;

    public function index(Request $request, $category_slug, $topic_slug)
    {   
        $topic = $topic_slug;
        $category = $category_slug;

        $posts = $topic->posts()->paginate($this->nbPaginate);

        $nbPostsBefore = (($request->input('page') ?? 1) - 1) * $this->nbPaginate;

        if ($topic) {
            return view('posts', compact('topic', 'category', 
                                         'posts', 'nbPostsBefore'));
        } else {
            abort(404);
        }
        
    }

    public function addPost(Request $request, $category, $topic)
    {
        /*$this->validate($request, [
            'post' => 'required'
        ]);*/

        $urlRedirectValidator = url()->previous();

        if (strpos($urlRedirectValidator, 'page') !== false) {
            $urlRedirectValidator .= "&error=true";
        } else {
            $urlRedirectValidator = $request->path() . "?error=true";
        }


        $validator = Validator::make($request->all(), [
            'post' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect($urlRedirectValidator)
                      ->withErrors($validator)
                      ->withInput();
        }

        if ($request->postQuoteId != 0) {
            $post_quote = $request->postQuoteId;    
        } else {
            $post_quote = "";    
        }

        $result = $topic->addPost(
            new Post(['user_id'       => auth()->user()->id,
                      'content'       => $request->post,
                      'quote_post_id' => $post_quote,
                     ])
        );

        $nbPosts = $topic->posts->count();
        $nbpage  = 1 + ($nbPosts - $nbPosts%$this->nbPaginate)
                        /$this->nbPaginate;

        return redirect($category->slug . '/' .  $topic->topic_slug
                        . '?page=' .  $nbpage . '&add=true')
                        ->with('Post', 'New');
    }
}
