<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.user.login');
    }

    public function registerPage()
    {
        return view('auth.user.register');
    }

    public function register(UserRegisterRequest $request)
    {

        $user = User::query()->create([
           'email' => $request->input('email'),
           'password' => bcrypt($request->input('password')),
           'name' => $request->input('name')
        ]);

        Auth::login($user);

        return redirect()->intended();
    }

    public function loginPage()
    {
        return view('auth.user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
    }


}
