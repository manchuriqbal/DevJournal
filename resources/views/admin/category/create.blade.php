@extends('layouts.admin.app')

@section('title', 'Create Category')


@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Create New Category</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            <!-- Title -->
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title <span
                        class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                    <div>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Slug -->
            {{-- <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug <span
                        class="text-red-500">*</span></label>
                <input type="text" id="slug" name="slug" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('slug')
                <div>
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                </div>
                @enderror
            </div> --}}

            <!-- Parent Category -->
            <div>
                <label for="parent_category" class="block text-sm font-medium text-gray-700">Parent Category </label>
                <select id="parent_category" name="parent_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select Parent Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <div>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description </label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                @error('description')
                    <div>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-right">

                <input type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md"
                    value="Category Create">
            </div>
        </form>
    </div>
@endsection