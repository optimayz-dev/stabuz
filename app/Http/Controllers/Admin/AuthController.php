<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required']
        ]);

        if (auth('admin')->attempt($data))
        {
            return redirect(route('admin.dashboard'));
        }
        return redirect(route('admin.login'))->withErrors(['email' => 'Пользователь не найден']);
    }
}
