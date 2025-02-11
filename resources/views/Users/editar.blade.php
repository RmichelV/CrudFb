@extends('template')
@section('content')

<form action="{{route('roles.update', $role->id)}}" method="post">
    @csrf
    @method('PUT')
    <h1>Editar Rol</h1>
        <div>
            <x-input-label for="name" :value="__('Nombre del rol')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$role->name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
           <x-secondary-button
           class="mt-4"
           type="button"
           x-data=""
           x-on:click="window.location.assign('{{route('roles.index')}}')"
           >
                {{ __('Cancelar') }}
            </x-secondary-button>
            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>
        </div>
</form>
@endsection