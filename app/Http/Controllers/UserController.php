<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function getSignIn(Request $request)
	{
		return view('admin.login');
	}

    public function postLogin(Request $request)
    {
        $remember = false;
        if ($request['remember-me']) $remember = true;
        if (Auth::attempt( ['email' => $request['email'], 'password' => $request['password'] ], $remember)) {
            return redirect('/admin');
        } else {
            return redirect()->back()->with('error', 'Nieprawidłowy e-mail lub hasło. Spróbuj ponownie.')->withinput();
        }
    }

    public function getLogout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
