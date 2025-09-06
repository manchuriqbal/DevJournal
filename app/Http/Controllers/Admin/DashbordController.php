<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashbordController extends Controller
{
   public function index()
   {
        // Post stats
        $lastMonthPosts = Post::where('status', 'published')
            ->whereMonth('published_at', now()->subMonth()->month)->count();
        $currentMonthPosts = Post::where('status', 'published')
            ->whereMonth('published_at', now()->month)->count();

       
        if ($lastMonthPosts > 0) {
            $percentageChange = (($currentMonthPosts - $lastMonthPosts) / $lastMonthPosts) * 100;
        } else {
            $percentageChange = 100; 
        }

        // Comments stats
        $lastMonthComments = Comment::whereMonth('created_at', now()->subMonth()->month)->count();
        $currentMonthComments = Comment::whereMonth('created_at', now()->month)->count();

        // calculate percentage increase
        if ($lastMonthComments > 0) {
            $percentageComment = (($currentMonthComments - $lastMonthComments) / $lastMonthComments) * 100;
        } else {
            $percentageComment = 100; 
        }

        // view stats
        $currentMonthViews = $this->calculateStats(Post::class,  'view_count')['postCount'];
        $percentageView = $this->calculateStats(Post::class,  'view_count')['percentage'];

        // Like stats
        $currentMonthLikes = $this->calculateStats(Post::class,  'like_count')['postCount'];
        $percentageLikes = $this->calculateStats(Post::class,  'like_count')['percentage'];
        


        // recent posts
        $recentPosts = Post::where('status', 'published')
            ->latest()
            ->limit(5)
            ->get();
        $topCategorys = Category::withCount('posts')
                        ->orderBy('posts_count', 'desc')
                        ->limit(3)
                        ->get();

       return view('admin.dashboard')->with([
                'postCount' => $currentMonthPosts,
                'postPercentage' => $percentageChange,
                'viewCount' => $currentMonthViews,
                'viewPercentage' => $percentageView,
                'likeCount' => $currentMonthLikes,
                'likePercentage' => $percentageLikes,
                'commentCount' => $currentMonthComments,
                'commentPercentage' => $percentageComment,
                'recentPosts' => $recentPosts,
                'topCategorys' => $topCategorys,
       ]);
   }

   public function calculateStats($model, $statsType)
    {
        $lastMonth = $model::where('status', 'published')
            ->whereMonth('created_at', now()->subMonth()->month)->sum($statsType);
        $currentMonth = $model::where('status', 'published')
            ->whereMonth('created_at', now()->month)->sum($statsType);

        // calculate percentage increase
        if ($lastMonth > 0) {
            $percentageView = (($currentMonth - $lastMonth) / $lastMonth) * 100;
        } else {
            $percentageView = 100; 
        }

        return [
            'postCount' => $currentMonth,
            'percentage' => $percentageView,
        ];

    }
}
