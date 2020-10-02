<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
