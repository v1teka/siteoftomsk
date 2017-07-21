<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function show(User $user)
    {
        $roles = Role::all();
        return view('users.show', compact('user', 'roles'));
    }
}
