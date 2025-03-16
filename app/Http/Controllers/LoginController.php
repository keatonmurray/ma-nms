<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia; 

class LoginController extends Controller
{
    public function index() {
        return Inertia::render('LoginComponent');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->role == 'user') {
                return Inertia::location('/user');
            } 
            if($user->role == 'admin') {
                return Inertia::location('/admin');
            }
        }
        
        return Inertia::render('LoginComponent', [
            'errors' => [
                'email' => 'Invalid email address',
                'password' => 'Password is incorrect',
            ]
        ]);
    }   

    public function logout() {
        Auth::logout(); 
        request()->session()->invalidate(); 
        request()->session()->regenerateToken();

        return Inertia::location('/');
    }
}
