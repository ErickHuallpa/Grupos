<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Muestra el formulario de registro
    public function create(Request $request)
    {
        // Verificar si el usuario ya está registrado
        if (Session::has('user_id')) {
            return redirect()->route('groups.index')
                ->with('info', 'Ya estás registrado en un grupo y no puedes registrarte en otro.');
        }

        $groups = Group::all();
        $selectedGroupId = $request->query('group_id'); // Obtener el group_id de la URL

        return view('users.register', compact('groups', 'selectedGroupId'));
    }

    // Procesa el registro del usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'group_id' => 'required|exists:groups,id|unique:users,group_id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'city' => $request->city,
            'group_id' => $request->group_id,
        ]);

        // Guardar el ID del usuario y del grupo en la sesión
        Session::put('user_id', $user->id);
        Session::put('group_id', $user->group_id);

        return redirect()->route('groups.index')
            ->with('success', '¡Te has registrado exitosamente en el grupo!');
    }
}
