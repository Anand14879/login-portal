<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleHome(){
        return view('auth.home');
    }
    // public function callback(){
    //     try{
    //         $user=Socialite::driver('google')->user();

    //        $isUser = User::where('email',$user->getEmail())->first();

    //        if(!$isUser){
    //             $saveUser =User::updateOrCreate(
    //                 [
    //                     'google_id'=>$user->getId()
    //             ],
    //         [
    //             'name'=>$user->getName(),
    //             'email'=>$user->getEmail(),
    //             'password'=> Hash::make($user->getName().'@'.$user->getId()) 

    //         ]);
    //        }
    //        else{
    //         $saveUser= User::where('email',$user->getEmail())->update(
    //                 [
    //                     'google_id'=>$user->getId()
    //                 ]
    //             );

    //             User::where('email', $user->getEmail())->first();
    //        }

    //        Auth::loginUsingId($saveUser->id);
    //        return redirect()->route('home');
    //     }
    //     catch (Throwable $th){
    //     }
    // }

    public function callback()
{
    try {
        // Get the user data from Google
        $user = Socialite::driver('google')->user();

        // Check if a user with the same email exists in your database
        $existingUser = User::where('email', $user->getEmail())->first();

        if (!$existingUser) {
            // Create a new user if one doesn't exist
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make('your_default_password'), // You can set a default password for Gmail users
                'google_id' => $user->getId(),
                'email_verified_at' => now(), // Mark the email as verified for Gmail users
            ]);

            // Log in the new user
            Auth::login($newUser);
        } else {
            // Update the existing user's Google ID
            $existingUser->update(['google_id' => $user->getId()]);

            // Log in the existing user
            Auth::login($existingUser);
        }

        return redirect()->route('home');
    } catch (Throwable $th) {
        // Handle exceptions (e.g., log or display an error message)
        return redirect()->route('login')->with('error', 'Login failed. Please try again.');
    }
}

}
