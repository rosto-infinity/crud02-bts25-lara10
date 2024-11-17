<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="p-10">
        <div class="text-center">
            <h1 class="text-5xl font-bold">Laravel 10 CRUD Create, Read, Update and Delete with Tailwind CSS</h1>
        </div>
    </div>

    @yield('content')
    
</body>
</html>
