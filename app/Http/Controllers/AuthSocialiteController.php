<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialiteController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $user_google = Socialite::driver('google')->stateless()->user();

        $name_parts = explode(" ", $user_google->name);

        if (count($name_parts) == 4) {
            $first_name = $name_parts[0] . ' ' . $name_parts[1];
            $last_name = $name_parts[2] . ' ' . $name_parts[3];
        } else {
            $first_name = $name_parts[0];
            $last_name = implode(' ', array_slice($name_parts, 1));
        }

        $user = User::updateOrCreate([
            'google_id' => $user_google->getId(),
        ], [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $user_google->getEmail(),
        ]);

        Auth::login($user);

        return redirect()->to('/');
    }
}
