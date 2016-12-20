<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;

class PageController extends Controller
{
    public function homePage()
    {
        // $categories = DB::table('categories')->get();
        $categories = Category::all();

        return view('homepage', compact('categories'));
    }
}
