@extends('layouts.admin.app')

@section('title', 'Update Post')


@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Update Post</h2>
        <form action="{{ route('admin.posts.update', $post->id)}}" method="POST" class="space-y-6"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title <span
                        class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $post->title ?? old('title') }}">
                @error('title')
                    <div>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Thumbnail -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('image')
                    <div>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content <span
                        class="text-red-500">*</span></label>
                <textarea id="content" name="content" required rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"> {{$post->content ?? old('content')}}</textarea>
                @error('content')
                    <div>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Author -->
            <div>
                <label for="author" class="block text-sm font-medium text-gray-700">Author<span
                        class="text-red-500">*</span></label>
                <select id="user_id" name="user_id" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->name }} {{ $post->user_id == $user->id ? 'selected' : '' }} {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category<span
                        class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }} {{ old('category_id') == $category->id ? "selected" : "" }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror

            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <input type="submit" value="Create Post"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md">
            </div>
        </form>
    </div>
@endsection