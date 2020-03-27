<?php

namespace Celebi\Commands\Controllers;

use Illuminate\Http\Request;
use Celebi\Commands\Models\Blog;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('lang',session('locale'))->get();
        
        return view('blogs',compact('blogs'));
    }
}
