<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function form()
    {
        return view('login');
    }

    function process(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->intended();
        } else {
            Session::flash('error', 'Email atau Password salah!');
            return redirect()->back();
        }
    }

    function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->back();
    }
}
