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
                "credentials" => "L'adresse e-mail ou le mot de passe est invalide"
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
}
