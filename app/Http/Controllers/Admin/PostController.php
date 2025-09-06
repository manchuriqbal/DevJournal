<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at","desc")->paginate(15);
        return view('admin.post.index')->with([
            'posts' => $posts,
        ]);
    }

    public function pending()
    {
        $posts = Post::where('status',  'draft')
            ->orderBy('created_at','desc')
            ->paginate(15);
        return view('admin.post.pending')->with([
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.post.create')->with([
            'categories'=> $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');

        }

        $post = Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = \App\Models\Category::select('id', 'name')->get();
        $users = \App\Models\User::select('id', 'name')->get();
        return view('admin.post.edit')->with([
            'post'=> $post,
            'categories'=> $categories,
            'users'=> $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::find($id);
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }


    public function status (Request $request, Post $post)
    {
        $status = $request->validate([
            'status' => 'required|string|in:draft,published,archived',
        ]);

        $post['published_at'] = $status['status'] === 'published' ? now() : null;

        
        $post->update($status); 
        return redirect()->route('admin.posts.pending')->with('success', 'Post status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
