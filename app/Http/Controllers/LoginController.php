<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function login() {
        // User::create([
        //     'name' => 'Jean Baptiste',
        //     'email' => 'lolo@lolo.com',
        //     'password' => 'root',
        //     'profil' => 2,
        //     'auth_level' => 5
        // ]);
        return view('login');
    }

    public function doLogin(LoginRequest $request) {
        $credentials = $request->validated();
        // dd($credentials);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            echo ($request->input('password'));
            // dd(env('COMM_PROFIL'));
            if($user->profil == env('FOURNISSEUR_PROFIL')){
                return redirect()->intended(route('fournisseur.index'));
            } else if ($user->profil == env('COMM_PROFIL')){
                if(!session()->has('user'))
                {
                    $user->password = $request->input('password');
                    session()->put('user',$user);
                    echo("tafiditra ehhhh");
                }
                return redirect()->intended(route('comm.index'));
            } else {
                Auth::logout();
                return to_route('login')->withErrors([
                    'error' => 'There\'s an error in your authentication account. Please verify your account and try again.'
                ]);
            }

        }

    }
}
