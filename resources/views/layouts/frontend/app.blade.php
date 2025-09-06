<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | IBlog </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">

    @yield('head')
</head>

<body class="bg-gray-50 font-sans">
    <!-- Header/Navigation -->
    @include("layouts.frontend.partials.navbar")

    @yield('content')

    <!-- Footer -->
    @include("layouts.frontend.partials.footer")

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/script-2.js') }}"> </script>
</body>

</html>