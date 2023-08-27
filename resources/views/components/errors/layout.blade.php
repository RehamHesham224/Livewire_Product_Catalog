<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{$title??'Error'}}
    </title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
<div class="flex items-center justify-center h-screen bg-gray-100 min-h-screen">
    {{$slot}}
    @yield('content')
</div>
</body>
</html>
