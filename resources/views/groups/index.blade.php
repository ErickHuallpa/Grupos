@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Lista de Grupos</h1>
    <div class="row">
        @foreach($groups as $group)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $group->name }}</h5>
                        <p class="card-text">{{ $group->description }}</p>
                        <p class="card-text">
                            <small class="text-muted">Integrantes: {{ $group->users->count() }}</small>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('groups.users', $group->id) }}" class="btn btn-primary btn-sm">
                            Ver integrantes
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if(!$isUserRegistered)
        <div class="mt-4">
            <a href="{{ route('users.register') }}" class="btn btn-success">
                Registrarme en un grupo
            </a>
        </div>
    @endif
@endsection
