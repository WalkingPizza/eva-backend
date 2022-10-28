<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
    <head>
        <title>indigo Backend</title>
        <meta name="description" content="indigo Backend" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @vite('resources/css/app.css')
    </head>
    <body class="h-full">
        @include('partials.header')
        @yield('content')
    </body>
</html>
