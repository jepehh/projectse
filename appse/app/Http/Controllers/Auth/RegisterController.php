<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'user_name.required' => 'You must fill this field',
            'email.required' => 'You must fill this field',
            'password.required' => 'You must fill this field',
            'password_confirmation.required' => 'You must fill this field',
        ]);

        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('register.details', ['id' => $user->id])->with('success', 'Registration successful! Please complete additional information.');
    }
}
