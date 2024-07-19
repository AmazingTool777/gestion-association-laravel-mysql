<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginShow()
    {
        return view("login");
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                "credentials" => "Adresse e-mail ou mot de passe incorrect",
            ])->onlyInput("email", "password");
        }

        /**
         * @var User
         */
        $authUser = Auth::user();

        if (!$authUser->isAdmin()) {
            return redirect("/");
        } else {
            return redirect()->route('back-office.dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return back();
    }
}
