<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userinfor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('backend.auth.register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        if($user)
        {
            // $email = $request->get('email');
            $user_id = User::all()->last();
            // dd($user_id->id);
            Userinfor::create([
                'user_id' => $user_id->id,
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
            ]);
        }

        $acc = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($acc))
        {
            $request->session()->regenerate();
            return redirect()->intended('/dady');
        }

        // return redirect()->route('login.form');
    }
}
