<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Aler;
use Socialite;
use App\Models\User;

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
                return redirect()->intended('/admin');
            }else{
                // dd('HOME');
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }else{
            alert()->warning('error','Tài khoản không hợp lệ');
            return redirect()->back();
        }
    }

    /**
    * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
        // only allow people with @company.com to login
        if(explode("@", $user->email)[1] !== 'gmail.com'){
            return redirect()->to('/');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/admin');
    }
}
