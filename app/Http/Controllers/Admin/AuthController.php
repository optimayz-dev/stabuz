<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
//        if (\auth('web')){
//            return redirect()->intended('admin/login');
//        }
        return view('auth.admin.login');

    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required']
        ]);

        if (Auth::guard('admin')->attempt($data))
        {
            return redirect(route('admin.dashboard'));
        }else{
            return redirect(route('admin.login'))->withErrors(['email' => 'Пользователь не найден']);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect(route("admin.login"));
    }

}


