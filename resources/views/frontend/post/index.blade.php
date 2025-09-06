@extends('layouts.frontend.app')

@section('title', 'Posts')

@section('content')

    <!-- Main Content -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-2">Featured Posts</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Featured Post 1 -->
                @foreach ($posts as $post)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        @if (Str::startsWith($post->image, ['https://']))
                            <img src="{{ $post->image }}" alt="Web Development" class="w-full h-48 object-cover">
                        @else
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Web Development"
                                class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <span
                                    class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">{{ $post->category->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                                <span class="mx-2">•</span>
                                <span>5 min read</span>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 150) }}.</p>
                            <a href="{{ route('post.show', $post->slug) }}"
                                class="text-blue-600 font-medium hover:text-blue-800 transition">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </section>
@endsection