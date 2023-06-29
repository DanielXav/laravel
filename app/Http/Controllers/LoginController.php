<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos']);
        }

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return to_route('login');
    }
}
