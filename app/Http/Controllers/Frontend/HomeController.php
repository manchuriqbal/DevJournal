<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::latest()->where('is_featured', true)->limit(3)->get();
        $recentPosts = Post::latest()->limit(5)->get();

        return view('frontend.home.index')->with([
            'featuredPosts' => $featuredPosts,
            'recentPosts'=> $recentPosts
        ]);
    }
    
}
