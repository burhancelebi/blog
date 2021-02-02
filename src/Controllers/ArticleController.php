<?php

namespace Celebi\Commands\Controllers;

use App\Http\Controllers\Controller;
use Celebi\Commands\Models\Blog;

class ArticleController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('lang', session('locale'))->get();

        return view('blogs', compact('blogs'));
    }
}
