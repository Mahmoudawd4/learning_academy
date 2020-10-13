<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    //
    public function login()
    {
        return view('Admin.Auth.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:5|max:50'
        ]);

        $isLogin=Auth::attempt(['email'=>$request->email , 'password'=>$request->password]);

      if (! $isLogin)
      {
          return back();

      }else
      {
          return redirect(route('Admin.home'));
      }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('Admin.login'));

    }

        //code socail login githup
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
        //code socail login githup
        $email=$user->email;
        $db_user=User::where('email','=',$email)->first(); // shof elmail da amal login wla la

        if($db_user == null)  //lo mash 3amal login
        {
            //sagal data fe data base
           $register= User::create([
                'name' =>$user->name ,
                'email' => $user->email,
                'password' => Hash::make('123456') ,
                'oauth_token' =>$user->token
            ]);

            //a3mal login leh
            Auth::login($register);

        }else
        {
                        //a3mal login leh bel bynato
            Auth::login($db_user);
        }

        return redirect(route('Admin.home'));

    }

}
