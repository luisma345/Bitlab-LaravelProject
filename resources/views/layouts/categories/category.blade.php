<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Website') | TECH NEWS</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('img/logo/TechNewsLogo-Brujula.png')}}" type="image/png">
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-black">
    @include('partials.navbar.navbar',['menu'=>'categories'])

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-white my-4 text-center">@yield('h1','CATEGORÍAS:')</h1>
        @yield('content-categories')
    </div>
</body>
</html>