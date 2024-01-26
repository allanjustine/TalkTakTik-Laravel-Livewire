<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function loginForm() {
        if(auth()->check()) {
            return redirect('/dashboard');
        }

        return view('auth.login');
    }
    public function login(Request $request) {
        $request->validate([
            'password'          =>      'required|string',
            'email'             =>      'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at == null) {
            return redirect('/')->with('error', 'Sorry your account is not yet verified or does not exist');

            return redirect()->intended('admin');
        }
        $login = auth()->attempt([
            'email'     =>  $request->email,
            'password'  =>  $request->password
        ]);

        if(!$login){
            return back()->with('error', 'Password is incorrect');
        }
        if (auth()->user()->is_admin) {
            return redirect()->intended('admin');
        }
        return redirect()->intended('dashboard');
    }
    public function registerForm() {
        if(auth()->check()) {
            return redirect('/dashboard');
        }

        return view('auth.register');
    }
    public function register(Request $request) {
        $request->validate([
            'name'          =>          'required|string',
            'gender'        =>          'required|string',
            'email'         =>          'required|email|unique:users',
            'password'      =>          'required|confirmed|string:|min:6'
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name'                  =>      $request->name,
            'email'                 =>      $request->email,
            'gender'                =>      $request->gender,
            'password'              =>      bcrypt($request->password),
            'remember_token'        =>      $token
        ]);

        $user->assignRole('user');

        Mail::send('auth.verification-email', ['user' => $user], function($mail) use($user){
            $mail->to($user->email);
            $mail->subject('Account verification');
        });

        return redirect('/')->with('message', 'Your account has been created. Please check your email for verification');
    }

    public function verification(User $user, $token){
        if($user->remember_token !== $token){
            return redirect('/')->with('error', 'Invalid token. The attached token is invalid or has already been consumed.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('message', 'Your account has been verified. You can login now.');
    }
    public function logout() {
        auth()->logout();
        return redirect('/')->with('message', 'Log out successfully');
    }
}
