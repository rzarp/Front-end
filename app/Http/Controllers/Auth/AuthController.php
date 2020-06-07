<?php

namespace App\Http\Controllers\Auth;

Use Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password', 'remember_me');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'status' => 1], $credentials['remember_me'] ?? false)) {
            return redirect()->intended('dashboard');
        } else {
            Alert::error('Failed Login!', 'Please check the credentials you entered.');
            return redirect('login');
        }
    }
}
