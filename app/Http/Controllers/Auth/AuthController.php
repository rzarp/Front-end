<?php

namespace App\Http\Controllers\Auth;

Use Alert;
use App\User;
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
        $user = User::where('email',$credentials['email'])->first();
        if ($user->status === 1) {
            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'status' => 1], $credentials['remember_me'] ?? false)) {
                session([
                    'email' => [
                        'emailSatu',
                        'emailDua'
                    ],
                    'name' => $user->name
                ]);
                return redirect()->intended('dashboard');
            } else {
                Alert::error('Failed Login!', 'Please check the credentials you entered.');
                return redirect('login');
            }
        } else {
            Alert::error('Failed Login!', 'Your account is inactive.');
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        redirect('');
    }
}
