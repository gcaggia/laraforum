<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;


class CategoryController extends Controller
{
    public function index($pcategory)
    {	
    	$category = Category::where('id', 1)->first();
    	
    	if ($category) {
    		return view('category', compact('category'));
    	} else {
    		abort(404);
    	}
    	
    }
}
