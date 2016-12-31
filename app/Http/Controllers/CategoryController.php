<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;


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
