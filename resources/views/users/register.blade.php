@extends('layouts.app')

@section('content')
    @if(Session::has('user_id'))
        <div class="alert alert-info">
            Ya estás registrado en un grupo y no puedes registrarte en otro.
        </div>
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Volver a la lista de grupos</a>
    @else
        <h1 class="mb-4">Registrarme en un grupo</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="mb-3">
                <label for="group_id" class="form-label">Grupo</label>
                <select class="form-select" id="group_id" name="group_id" required>
                    <option value="">Selecciona un grupo</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{ isset($selectedGroupId) && $selectedGroupId == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrarme</button>
        </form>
    @endif
@endsection
