<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.properties.index'))->with('success', 'Vous êtes maintenant connecté !');
        }
        return to_route('auth.login')->with('error', 'Identifiants incorrects :(')->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login')->with('alert', 'Vous êtes maintenant déconnecté');
    }
}
