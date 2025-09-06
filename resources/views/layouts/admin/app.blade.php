<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | IBlog </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('head')
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">

        {{-- add sidebar menu --}}
        @include('layouts.admin.partials.sidebar-menu')

        <div class="flex-1 overflow-auto">

            {{-- add header --}}
            @include('layouts.admin.partials.header')

            <main class="px-4 py-6 sm:px-6 lg:px-8">



                {{-- add main content --}}
                @yield('content')


            </main>
        </div>
    </div>

    {{-- add script.js file --}}
    <script src="{{ asset('assets/js/script-2.js') }}"> </script>
    @stack('scripts')
</body>

</html>