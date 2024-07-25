<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginShow()
    {
        return view("login");
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials, true)) {
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

    public function signupShow()
    {
        return view("signup");
    }

    public function signup(SignupRequest $request)
    {
        $payload = $request->validated();

        DB::beginTransaction();

        $authUser = User::create([
            "email" => $payload["email"],
            "password" => Hash::make($payload["password"]),
            "role" => 'BASIC',
        ]);
        error_log(json_encode($authUser->toArray()));
        error_log("User id: $authUser->id");

        Profile::create([
            "first_name" => $payload["first_name"],
            "last_name" => $payload["last_name"],
            "birthday" => $payload["birthday"],
            "gender" => $payload["gender"],
            "address" => $payload["address"],
            "origin" => $payload["origin"],
            "zip_code" => $payload["zip_code"],
            "id_card" => json_encode([
                "id" => $payload["id_card_number"],
                "delivered_at" => $payload["id_card_delivered_at"],
                "delivered_in" => $payload["id_card_delivered_in"],
            ]),
            "profession" => $payload["profession"],
            "phone" => $payload["phone"],
            "user_id" => $authUser->id,
        ]);

        DB::commit();

        Auth::login($authUser, true);

        return redirect("/");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return back();
    }
}
