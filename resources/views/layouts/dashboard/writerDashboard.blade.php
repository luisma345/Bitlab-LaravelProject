<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard') - DASHBOARD | TECH NEWS</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('img/logo/TechNewsLogo-Brujula.png')}}" type="image/png">
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- ckeditor --}}
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
</head>
<body class="bg-black">
    @include('partials.navbar.navbar',['menu'=>'dashboardWriter'])
    
    <div class="flex w-auto">
        
        <div class="flex fixed justify-center w-1/6 pt-4">
            <div class="flex items-start mt-4 h-screen">
                <div class="bg-gray-800 rounded p-4">
                    <span class="text-2xl text-white">Gestionar:</span>
                    <a href="{{ route('writer.news.index') }}"
                    @if ( $option =='news')
                        class='block mt-2 px-2 rounded text-white bg-red-800 rounded text-center'>
                    @else
                        class='block mt-2 px-2 font-semibold rounded text-black bg-gray-200 
                        rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>
                    @endif
                    Mis Noticias</a>
                </div>
            </div>
        </div>
        <div class="w-1/6"></div>
        <div class="w-5/6">
            <div class="container mx-auto mb-4">
                <h1 class="text-2xl font-bold text-white my-4 text-center">@yield('h1','DASHBOARD')</h1>
                @yield('content')
            </div>
        </div>

    </div>
    <script>
        flatpickr("#publication_date", { enableTime: true, minDate: 'today' });

        CKEDITOR.config.height=400;
        CKEDITOR.config.width='auto';
       
      </script>
</body>
</html>