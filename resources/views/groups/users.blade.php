@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Integrantes del grupo: {{ $group->name }}</h1>
    <div class="card mb-4">
        <div class="card-body">
            <p class="card-text">{{ $group->description }}</p>
        </div>
    </div>
    <h3>Lista de integrantes:</h3>
    <div class="list-group">
        @forelse($users as $user)
            <div class="list-group-item">
                <strong>{{ $user->name }}</strong> - {{ $user->city }}
            </div>
        @empty
            <div class="list-group-item">
                No hay integrantes en este grupo.
            </div>
        @endforelse
    </div>
    <div class="mt-4">
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">
            Volver a la lista de grupos
        </a>
        @if(!$isUserRegistered)
            <a href="{{ route('users.register', ['group_id' => $group->id]) }}" class="btn btn-success">
                Registrarme en este grupo
            </a>
        @endif
    </div>
@endsection
