<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $users = $request->only('email', 'password'); 

        if(Auth::attempt($users)){
            return redirect('home');
        }
        return back()->withErrors(['email'=>'Invalid Credentials']);
    }

    public function home(){
        return view('auth.home');
    }

    public function logout(){
         Auth::logout();
         return view('auth.login');
    }


}
