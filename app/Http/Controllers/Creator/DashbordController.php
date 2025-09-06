<?php

namespace App\Http\Controllers\Creator;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class DashbordController extends Controller
{

    public function calculateStats($model, $postable_type, $postable_id, $statsType)
    {
        $lastMonth = $model::where('postable_type', $postable_type)
            ->where('postable_id',$postable_id)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->sum($statsType);
        $currentMonth = $model::where('postable_type', $postable_type)
            ->where('postable_id',$postable_id)
            ->whereMonth('created_at', now()->month)
            ->sum($statsType);

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
   public function index()
   {
       $postable_type = 'App\Models\Creator';
       $postable_id = auth('creator')->user()->id;
       
        // Increase from last month
        $lastMonthPosts = Post::where('postable_type', $postable_type)
            ->where('postable_id',$postable_id)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->count();
        $currentMonthPosts = Post::where('postable_type', $postable_type)
            ->where('postable_id',$postable_id)
            ->whereMonth('created_at', now()->month)
            ->count();

        // calculate percentage increase
        if ($lastMonthPosts > 0) {
            $percentageChange = (($currentMonthPosts - $lastMonthPosts) / $lastMonthPosts) * 100;
        } else {
            $percentageChange = 100; 
        }


        // view stats
        $currentMonthViews = $this->calculateStats(Post::class, $postable_type, $postable_id, 'view_count')['postCount'];
        $percentageView = $this->calculateStats(Post::class, $postable_type, $postable_id, 'view_count')['percentage'];

        // Like stats
        $currentMonthLikes = $this->calculateStats(Post::class, $postable_type, $postable_id, 'like_count')['postCount'];
        $percentageLikes = $this->calculateStats(Post::class, $postable_type, $postable_id, 'like_count')['percentage'];
        
        // Comments stats
        $commenter_type = 'App\Models\Creator';
        $commenter_id = auth('creator')->user()->id;

        $lastMonthComments = Comment::where('commenter_type', $commenter_type)
            ->where('commenter_id',$commenter_id)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->count();
        $currentMonthComments = Comment::where('commenter_type', $commenter_type)
            ->where('commenter_id',$commenter_id)
            ->whereMonth('created_at', now()->month)
            ->count();

        // calculate percentage increase
        if ($lastMonthComments > 0) {
            $percentageComment = (($currentMonthComments - $lastMonthComments) / $lastMonthComments) * 100;
        } else {
            $percentageComment = 100; 
        }


        // recent posts
        $recentPost = Post::where('postable_type', $postable_type)
            ->where('postable_id',$postable_id)
            ->latest()
            ->limit(5)
            ->get();

       return view('creator.dashboard')->with([
                'post_count' => $currentMonthPosts,
                'percentageChange' => $percentageChange,
                'view_count' => $currentMonthViews,
                'view_percentage' => $percentageView,
                'like_count' => $currentMonthLikes,
                'like_percentage' => $percentageLikes,
                'comment_count' => $currentMonthComments,
                'comment_percentage' => $percentageComment,
                'recent_posts' => $recentPost,
       ]);
   }
}
