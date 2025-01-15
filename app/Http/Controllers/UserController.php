<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'loginemail' => 'required|email',
            'loginpassword' => 'required|string'
        ]);
        if (Auth::attempt(['email' => $validatedData['loginemail'], 'password' => $validatedData['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'loginemail' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        Auth::login($user);
        return redirect('/');
    }
    
}
