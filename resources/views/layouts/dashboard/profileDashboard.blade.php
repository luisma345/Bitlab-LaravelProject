<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Perfil') | TECH NEWS</title>

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
<body class="bg-white">
    @include('partials.navbar.navbar',['menu'=>'profile'])
    
    <div class="flex w-auto">
        
        <div class="flex fixed justify-center w-1/6 pt-4">
            <div class="flex items-start mt-4 h-screen">
                <div class="rounded-lg border-blue-800 border-2 p-4">
                    <div class="flex justify-center">
                        <span class="text-2xl font-bold">Ver:</span>
                    </div>
                    <a href="{{ route('profile.show', auth()->user()->id) }}"
                    @if ( $option =='profile')
                        class='block mt-2 px-2 rounded text-white bg-red-800 border-red-800 border-2 rounded text-center'>
                    @else
                        class='block mt-2 px-2 font-semibold rounded text-black border-red-800 border-2 
                        rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>
                    @endif
                    Perfil</a>
                    
                    <a href="{{ route('profile.readingHistory') }}"
                    @if ( $option =='user_history')
                        class='block mt-2 px-2 rounded text-white bg-red-800 border-red-800 border-2 rounded text-center'>
                    @else
                        class='block mt-2 px-2 font-semibold rounded text-black border-red-800 border-2
                        rounded hover:bg-red-800 hover:text-white hover:font-normal text-center'>
                    @endif
                        Historial</a>
                    
                </div>
            </div>
        </div>
        <div class="w-1/6"></div>
        <div class="w-5/6">
            <div class="container mx-auto mb-4">
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