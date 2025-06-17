<?php

namespace App\Http\Controllers;

use App\Events\userlogin;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $data =$request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            event(new userlogin(auth()->user()));
            $request->session()->regenerate();
            return redirect()->route('home')->with('succes','kelar');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegister() {
        return view('auth.registrasi');
    }

    public function registrasi(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect('/');
    }
    public function destroy()
    {
        Auth::guard("web")->logout();

    
        return redirect()->route('home');
    }
}
    
