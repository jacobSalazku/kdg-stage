<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield("pagetitle")</title>

    <link rel="icon" href="https://www.kdg.be/themes/custom/culet/images/skins/kdg/favicons/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!--- CSS CDN -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet"/>

</head>
<body class="font-sans antialiased bg-kdg-white">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 bg-white">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="flex flex-row justify-center">
        {{ $slot }}
    </main>
</div>
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{asset('js/quill.js')}}"></script>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</body>
<footer>
    <div class="flex justify-center gap-1 bg-deep-black text-kdg-white font-KDG p-3" >
        &copy; {{ now()->year }} <a target="__blank" href="https://github.com/mctantwerp"> Students And More</a>
    </div>
</footer>
</html>
