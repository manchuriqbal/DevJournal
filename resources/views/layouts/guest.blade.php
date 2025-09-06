<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" />
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <div class="text-center">
                <div>

                    <x-secondary-button class="ms-3">
                        <a href="{{ route('login') }}"
                            class=" pr-2  text-gray-500 no-underline hover:text-gray-900 dark:hover:text-gray-100 rounded-md">User</a>
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

                <div class="flex justify-center mb-4">
                    <i class="fas fa-user-circle text-5xl text-blue-600"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Welcome back @yield('role')</h2>
                <p class="mt-2 text-gray-600">Sign in to access your account</p>
            </div>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>