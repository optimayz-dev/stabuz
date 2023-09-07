<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.user.login');
    }

    public function register(Request $request)
    {

        $user = User::query()->create([
           'email' => $request->input('email'),
           'password' => bcrypt($request->input('password')),
           'name' => $request->input('name')
        ]);

        Auth::login($user);

    }

    public function login()
    {

    }

}
