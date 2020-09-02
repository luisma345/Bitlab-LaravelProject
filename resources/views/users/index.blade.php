@extends('layouts.dashboard.dashboard')

@section('title','Usuarios')
@section('h1','Usuarios:')


@section('content')
    <div class="flex justify-center mt-8">
        @include('partials.ui.button', ['label' => 'Crear Usuario', 'url' => route('users.create')])
    </div>
    @if (count($users) == 0)
        <div class="flex justify-center mt-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="img/icons/alert.svg" alt="Alert!">
                </div>
                <p class="block text-white text-xl">¡No hay usuarios registrados!</p>
            </div>
        </div>
    @else
        @foreach($users as $user)
            <div class="md:flex md:justify-center p-2">
                    <a href="{{ route('users.show', $user->id) }}" 
                        class="flex items-center bg-white p-4 w-full md:w-1/2 rounded 
                                hover:bg-blue-800 hover:text-white">
                        <img 
                            @if (!is_null($user->image))
                                src="{{ asset("storage/users-profilePicture/{$user->image}")}}"
                            @else
                                src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}"
                            @endif
                        alt="Tech News Logo" class="w-8 rounded-full">
                        <div class="block">
                            <div class="font-bold ml-2">Username: {{ $user->user_name }} </div>
                            <div class="font-bold ml-2">Correo: {{ $user->email }} </div>
                        </div>
                    </a>
            </div>
        @endforeach
    @endif
@endsection