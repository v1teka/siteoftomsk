<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function adminShow(User $user)
    {
        $roles = Role::all();
        return view('users.admin.show', compact('user', 'roles'));
    }

    public function adminIndex()
    {
        $users = User::with('roles')->paginate(20);
        return view('users.admin.index', compact('users'));
    }

    public function adminUpdate(User $user)
    {
        $this->validate(request(), [
            'roles' => 'nullable|array',
        ]);

        $user->roles()->sync(request('roles'));
        $user->access_forum = request('access_forum') ? '1' : '0';
        $user->save();

        return redirect()->route('users.admin.show', $user);
    }
}
