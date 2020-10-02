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
    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body class="bg-white">
    @include('partials.navbar.navbar',['menu'=>'dashboard'])
    
    
        
        <div class="flex fixed justify-center w-full pt-4">
            <div class="flex items-start mt-4 h-screen">
                <div class="block w-full">
                    <h1 class="text-2xl font-bold text-center">Dashboard</h1>
                    <div class="rounded-lg border-blue-800 border-2 p-4 mt-2">
                        <span class="text-2xl font-bold text-center">Gestionar:</span>
                        <a href="{{ route('admin.news.index') }}"
                        @if ( $option =='news')
                            class='block mt-2 px-2 rounded text-white bg-red-800 border-red-800 border-2 rounded text-center'>
                        @else
                            class='block mt-2 px-2 font-semibold border-red-800 border-2 rounded text-black 
                            rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>
                        @endif
                        Noticias</a>
                            <a href="{{ route('admin.categories.index') }}"
                        @if ( $option =='category')
                            class='block mt-2 px-2 rounded text-white bg-red-800 border-red-800 border-2 rounded text-center'>
                        @else
                            class='block mt-2 px-2 font-semibold border-red-800 border-2 rounded text-black 
                            rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>
                        @endif
                            Categorías</a>
                        
                        <a href="{{ route('admin.users.index') }}"
                        @if ( $option =='user')
                            class='block mt-2 px-2 rounded text-white bg-red-800 border-red-800 border-2 rounded text-center'>
                        @else
                            class='block mt-2 px-2 font-semibold rounded border-red-800 border-2 text-black 
                            rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>
                        @endif
                            Usuarios</a>
                        
                        
                    </div>
                </div>
            </div>
        </div>

    <script>
        flatpickr("#publication_date", { enableTime: true, minDate: 'today' });
      </script>
</body>
</html>