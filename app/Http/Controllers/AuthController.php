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
        $data = $request->all();
        dd($data);
        $users = $request->only('email', 'password'); 

        if(Auth::attempt($users)){
            return redirect('home');
        }
        return back()->withErrors(['email'=>'Invalid Credentials']);

        //Remember user email and password with cookies
        if(isset($data['remember'])&&!empty($data('remember'))){
            setcookie('email',$data('email'),time+3600);
            setcookie('password',$data('password'),time+3600);

        }
        else{
            setcookie('email',"");
            setcookie('password',"");
        }
    }

    public function home(){
        return view('auth.home');
    }

    public function logout(){
         Auth::logout();
         return view('auth.login');
    }


}
