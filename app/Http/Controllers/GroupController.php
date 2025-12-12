<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    // Lista todos los grupos
    public function index()
    {
        $groups = Group::all();
        $isUserRegistered = Session::has('user_id');
        return view('groups.index', compact('groups', 'isUserRegistered'));
    }

    // Muestra los integrantes de un grupo específico
    public function showUsers(Group $group)
    {
        $users = User::where('group_id', $group->id)->get();
        $isUserRegistered = Session::has('user_id');
        $userGroupId = Session::get('group_id');
        return view('groups.users', compact('group', 'users', 'isUserRegistered', 'userGroupId'));
    }
}
