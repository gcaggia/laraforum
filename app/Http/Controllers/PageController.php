<?php

namespace LaraForum\Http\Controllers;

use Illuminate\Http\Request;
use LaraForum\Http\Requests;
use LaraForum\Category;

class PageController extends Controller
{
    public function homePage()
    {
        // $categories = DB::table('categories')->get();
        $categories = Category::all();

        return view('homepage', compact('categories'));
    }
}
