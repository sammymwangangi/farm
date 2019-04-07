<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sign_in(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/home');
        }
        return redirect()->back()->with('error', 'Wrong login details');
    }

    public function register()
    {
        return view('register');
    }

    public function post_register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);
        User::create(array_merge([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]));
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
