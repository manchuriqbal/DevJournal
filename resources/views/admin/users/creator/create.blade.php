@extends('layouts.admin.app')

@section('title', 'Create Author')

<!-- Session Status -->
@section('head')
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" />
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection

@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <div class="text-center">

                <h2 class="text-3xl font-bold text-gray-900">Create New Author</h2>
                <p class="mt-2 text-gray-600">For Write Best Blog</p>
            </div>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('admin.creators.store') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                        autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Phone -->
                <div>
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('name')"
                        required autofocus autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email ')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                {{-- Gender --}}
                <div>
                    {{-- <x-input-label for="gender" :value="__('Gender')" /> --}}
                    <label for="gender" class="block text-sm font-medium text-gray-700">Author</label>
                    <select id="gender" name="gender" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white focus:ring-blue-500 focus:border-blue-500">

                        <option value="male"> Male </option>
                        <option value="female"> Female </option>

                    </select>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <!-- Profile Image -->
                <div>
                    <x-input-label for="avatar" :value="__('Profile Picture')" />
                    <input type="file" name="avatar" id="avatar" required autofocus autocomplete="avatar">
                    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Passwrod: (password)')" />
                    <input type="hidden" name="password" value="password">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
@endsection