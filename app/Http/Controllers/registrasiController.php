<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegistrasiController extends Controller
{
    public function index(){
        return view('auth.registrasi');
    }
    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'password'=>'required',
        ]);

        $user=User::create($data);

        Auth::login($user);

        // $request->user()->sendEmailVerificationNotification();
        return redirect()->route('home')->with('succes','register succes');
    }
}
