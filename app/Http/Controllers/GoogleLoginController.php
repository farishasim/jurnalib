<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver("google")->with(["prompt" => "select_account"])->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver("google")->stateless()->user();

        $user = User::where("email", $googleUser->email)->first();
        if (!$user) {
            return redirect("/");
        }

        Auth::login($user);

        return redirect()->route("dashboard");
    }
}

?>