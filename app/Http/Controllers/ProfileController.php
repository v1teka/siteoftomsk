<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function update()
    {
        $user = Auth::user();

        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'sometimes|nullable|string|min:6|confirmed|different:old_password',
            'old_password' => 'required_with:password|nullable|user_password',
        ]);
        $validator->validate();

        $user->name = request('name');
        $user->surname = request('surname');
        $user->email = request('email');
        if(!empty(request('password'))) {
            $user->password = bcrypt(request('password'));
        }
        $user->save();

        return redirect()->route('profile.show');
    }
}
