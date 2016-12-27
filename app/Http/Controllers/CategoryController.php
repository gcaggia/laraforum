<?php

namespace LaraForum\Http\Controllers;

use LaraForum\Category;
use Illuminate\Http\Request;
use LaraForum\Http\Requests;


class CategoryController extends Controller
{
    public function index($category_slug)
    {   
        $category = $category_slug;
        
        if ($category) {
            return view('category', compact('category'));
        } else {
            abort(404);
        }
        
    }
}
