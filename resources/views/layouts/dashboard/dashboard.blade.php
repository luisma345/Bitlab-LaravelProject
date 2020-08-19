<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard') | TECH NEWS</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('img/logo/TechNewsLogo-Brujula.png')}}" type="image/png">
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-black">
    @include('partials.navbar.navbar',['menu'=>'dashboard'])
    
    <div class="flex h-screen w-auto">
        <div class="flex justify-center bg-gray-800 w-1/6 h-full pt-4">
            <div>
                <span class="text-2xl text-white">Gestionar:</span>
                <a href="{{ route('categories.index') }}" class='block mt-2 px-2 font-semibold rounded text-black bg-gray-200 
                rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>Noticias</a>
                    <a href="{{ route('categories.index') }}"
                @if ( $option =='category')
                    class='block mt-2 px-2 rounded text-white bg-red-800 rounded text-center'>
                @else
                    class='block mt-2 px-2 font-semibold rounded text-black bg-gray-200 
                    rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>
                @endif
                    Categorías</a>
                <a href="{{ route('categories.index') }}" class='block mt-2 px-2 font-semibold rounded text-black bg-gray-200 
                    rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>Usuarios</a>
                <a href="{{ route('categories.index') }}" class='block mt-2 px-2 font-semibold rounded text-black bg-gray-200 
                    rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>Administradores</a>
                
            </div>
        </div>
        <div class="w-5/6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold text-white my-4 text-center">@yield('h1','DASHBOARD')</h1>
                @yield('content-categories')
            </div>
        </div>

    </div>
</body>
</html>