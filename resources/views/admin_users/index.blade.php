@extends('layouts.dashboard.dashboard')

@section('title','Administradores')
@section('h1','Administradores:')


@section('content')
    <div class="flex justify-center mt-8">
        @include('partials.ui.button', ['label' => 'Crear Usuario Administrador', 'url' => route('adminUser.create')])
    </div>
    @if (count($adminUsers) == 0)
        <div class="flex justify-center mt-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="img/icons/alert.svg" alt="Alert!">
                </div>
                <p class="block text-white text-xl">¡No hay administradores creados!</p>
            </div>
        </div>
    @else
        @foreach($adminUsers as $user)
            <div class="md:flex md:justify-center p-2">
                    <a href="{{ route('adminUser.show', $user->id) }}" 
                        class="flex items-center bg-white p-4 w-full md:w-1/2 rounded 
                                hover:bg-blue-800 hover:text-white">
                        <img src="img/logo/TechNewsLogo-Brujula.png" alt="Tech News Logo" class="w-8 rounded-full">
                        <div class="block">
                            <div class="font-bold ml-2">Username: {{ $user->user_name }} </div>
                            <div class="font-bold ml-2">Correo: {{ $user->email }} </div>
                        </div>
                    </a>
            </div>
        @endforeach
    @endif
@endsection