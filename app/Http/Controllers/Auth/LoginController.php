<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function FormLogin()
    {
        return view('backend.auth.loginForm');
    }

    public function Login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        // dd($email , $password);
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            if(Auth::User()->role == 2 || Auth::User()->role == 3){
                // dd('ADMIN');
                $request->session()->regenerate();
                return redirect()->intended('/dady');
            }else{
                // dd('HOME');
                $request->session()->regenerate();
                return redirect()->intended('/home');
            }
        }else{
            return redirect()->back();
        }
    }
}
