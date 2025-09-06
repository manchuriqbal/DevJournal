@extends('layouts.admin.app')

@section('title', 'Authors')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">All Authors</h2>
            <a href="{{ route('admin.creators.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Create Author
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Profile
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Posts
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Views
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Likes
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($authors as $user)
                        <tr>

                            @if (Str::startsWith($user->profile->avatar ?? '', ['https://']))
                                <td class="px-6 py-4">
                                    <img src="{{ $user->profile->avatar }}" alt="" class="w-16 h-16 object-cover rounded-full">
                                </td>
                            @else
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . ($user->profile->avatar ?? 'defaults/avatar.png')) }}" alt=""
                                        class="w-16 h-16 object-cover rounded-full">
                                </td>

                            @endif
                            {{-- <td class="px-6 py-4  text-sm font-medium text-gray-900">

                            </td> --}}
                            <td class="px-6 py-4  text-sm font-medium text-gray-900">
                                {{ $user->name }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->posts->count() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->posts->sum('view_count') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->posts->sum('like_count') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    <div>
                                        <a href="" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                    </div>

                                    <div>
                                        <form action="{{ route('admin.creators.destroy', $user->id) }}" method="POST">
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
            {{ $authors->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection