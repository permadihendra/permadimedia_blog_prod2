<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;

class SiteMapController extends Controller
{
    //
    public function generateSitemap()
    {
        return response()->view('sitemap', [
            'articles' => Article::latest()->get(),
            'categories' => Category::latest()->get(),
        ])->header('Content-Type', 'text/xml');
    }
}
