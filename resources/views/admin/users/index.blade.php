@extends('layouts.dashboard.adminDashboard')

@section('title','Usuarios')
@section('h1','Usuarios:')


@section('content')
    <div class="flex justify-center mt-8">
        @include('partials.ui.linkButton', ['label' => 'Crear Usuario', 'url' => route('admin.users.create')])
    </div>
    <div class="flex justify-center my-4">
        <div class="block">
            <form action="{{ route('admin.users.index') }}" method="GET">
                <div class="flex items-center w-full my-2">
                    <h2 class="text-white text-xl font-bold mr-2">Buscar: </h2>
                    <input type="text" name="keyword" class="bg-white px-4 py-1 mr-2 border-2 border-black border-solid rounded font-bold w-full"
                            value="{{ request()->keyword }}">
                    @include('partials.ui.blueButton', ['label' => 'Buscar'])
                </div>

            </form>
            
        </div>
    </div>
    @if (count($users) == 0)
    <div class="flex justify-center mt-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="{{ asset('img/icons/alert.svg') }}" alt="Alert!">
                </div>
                <p class="block text-white text-sm">¡No se encontraron resultados!</p>
            </div>
        </div>
    @else
        @if (!is_null(request()->keyword))
            <div class="flex justify-center mt-2">
                <a href="{{ route('admin.users.index') }}" 
                    class="text-white hover:text-red-800 underline">← Limpiar busqueda</a>
            </div>
            <div class="flex justify-center mt-2">
                <span class="text-white">Cantidad de resultados: {{$users->total() }}</span>
            </div>                
        @endif
<div class="mt-4 mr-4">
    <table class="text-white table-auto w-full">
        <thead>
            <th class="text-left">Usarname</th>
            <th class="text-left">Correo</th>
            <th class="text-left">Nombre</th>
            <th class="text-left">Apellido</th>
            <th class="text-left">Edad</th>
            <th class="text-left">Rol</th>
            <th class="text-left">Activo</th>
            <th class="text-left">Acción</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t">
                <td class="flex items-center py-1">
                    <img 
                        @if (!is_null($user->image))
                            src="{{ asset("storage/users-profilePicture/{$user->image}")}}"
                        @else
                            src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}"
                        @endif
                    alt="Tech News Logo" class="w-10 h-10 object-cover rounded-full mr-2">
                    {{ $user->user_name }}
                </td>
                <td class="py-1">
                    {{ $user->email}}
                </td>
                <td class="py-1">
                    {{ $user->first_name}}
                </td>
                <td class="py-1">
                    {{ $user->last_name}}
                </td>
                <td class="py-1">
                    {{ $user->age}}
                </td>
                <td class="py-1">
                    {{ $user->role->name}}
                </td>
                <td class="py-1">
                    {{ is_null($user->deleted_at) ? 'Sí' : 'No' }}
                </td>
                <td class="py-1">
                    @if (!(auth()->id()==$user->id))
                        @include('partials.ui.blueLinkButton', ['label' => 'Editar', 'url' => route('admin.users.edit', $user->id)])
                    @else 
                    <span class="bg-blue-800 bg-opacity-75 text-white text-opacity-75 p-2 mb-4 rounded">Editar
                    </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @endif
    <div class="flex justify-center my-8">
        <div class="block">
            {{-- <div class="flex justify-center">
                <span class="text-white">Cantidad de noticias: {{$news->total() }}</span>
            </div> --}}
            <div class="flex mt-1">
                @if ($users->hasPages())
                    <span class="text-white mx-2">
                        @if (!$users->onFirstPage())
                            <a href="{{ $users->previousPageUrl() }}" class="hover:text-red-800 underline" >←</a>
                        @else
                            ←
                        @endif
                    </span>
                    <span class="text-white mx-2">Página {{ $users->currentPage() }}/{{$users->lastPage()}}</span>
                    <span class="text-white mx-2">
                        @if ($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}" class="hover:text-red-800 underline">→</a>
                        @else
                            →
                        @endif
                    </span>
                @endif
            </div>
        </div>
    </div>
@endsection