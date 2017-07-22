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

    public function administrate()
    {
        $users = User::with('roles')->paginate(20);
        return view('users.admin', compact('users'));
    }

    public function update_roles(User $user)
    {
        $this->validate(request(), [
            'roles' => 'nullable|array',
        ]);

        $user->roles()->sync(request('roles'));
        $user->save();

        return redirect()->route('users.show', $user);
    }
}
