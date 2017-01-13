<?php

namespace App\Http\Controllers;

use App\Category;
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
}
