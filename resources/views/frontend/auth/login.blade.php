@extends('layouts.frontend.app')
@section('title', 'Login')
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
            <div>
                <x-secondary-button class="ms-3 mb-4">
                    <a href="{{ route('home') }}"
                        class=" pr-2 text-gray-500 no-underline hover:text-gray-900 dark:hover:text-gray-100 rounded-md">
                        Back to Home</a>
                </x-secondary-button>

                <x-secondary-button class="ms-3">
                    <a href="{{ route('admin.login') }}"
                        class=" pr-2  text-gray-500 no-underline hover:text-gray-900 dark:hover:text-gray-100 rounded-md">Admin</a>
                </x-secondary-button>

                <x-secondary-button class="ms-3">
                    <a href="{{ route('creator.login') }}"
                        class=" pr-2  text-gray-500 no-underline hover:text-gray-900 dark:hover:text-gray-100 rounded-md">Author</a>
                </x-secondary-button>
            </div>
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <i class="fas fa-user-circle text-5xl text-blue-600"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Welcome back</h2>
                <p class="mt-2 text-gray-600">Sign in to access your account</p>
            </div>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection