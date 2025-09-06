@extends('layouts.admin.app')

@section('title', 'Posts')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">All Posts</h2>
            <a href="{{ route('admin.posts.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Create Post
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Content
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Author
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)

                        <tr>
                            <td class="px-6 py-4  text-sm font-medium text-gray-900">
                                {{ $post->title }}
                            </td>
                            <td class="px-6 py-4">
                                @if (Str::startsWith($post->image, ['https://']))
                                    <img src="{{ $post->image }}" alt="" class="w-16 h-16 object-cover rounded">
                                @else
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-16 h-16 object-cover rounded">
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{Str::limit($post->content, 50, '...') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if (auth()->guard('admin')->check())
                                    {{ $post->postable ? $post->postable->name : 'Unknown Admin' }}
                                @elseif (auth()->guard('creator')->check())
                                    {{ $post->postable ? $post->postable->name : 'Unknown Creator' }}
                                @else
                                    Unknown

                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $post->category ? $post->category->name : 'Uncategorized' }}
                            </td>

                            <td class=" gap-2 whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                @if ($post->status === 'published')
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Published
                                    </span>
                                @elseif ($post->status === 'draft')
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Draft
                                    </span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Archived
                                    </span>

                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    @if ($post->postable_type == 'App\Models\Admin' && $post->postable_id == auth()->guard('admin')->id())

                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                    @endif
                                    {{-- <a href="#" class="text-red-600 hover:text-red-900">Delete</a> --}}
                                    <div>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            React
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat quaerat ipsa id ea magni
                            reprehenderit quidem, totam dolorem expedita consequatur vero ratione illum blanditiis neque,
                            ipsum ab accusantium beatae consectetur.
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Manchur Iqbal
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-between items-center">
            {{-- Paginatior --}}
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection