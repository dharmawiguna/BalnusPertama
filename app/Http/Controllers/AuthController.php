<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function postlogin(Request $request)
    {
    	if (Auth::attempt($request->only('email','password'))) {
    		return redirect('/index');
    	}
    	return redirect('/login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }

    public function register()
    {
    	return view('register');
    }

    public function postregister(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|min:4',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:8|confirmed',
    	]);
    	User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    	]);
    	return redirect('/login');
    }
}
