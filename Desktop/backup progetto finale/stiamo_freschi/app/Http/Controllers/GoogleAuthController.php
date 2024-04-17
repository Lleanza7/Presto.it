<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->getEmail())->first();

            if (!$user) {
                // L'utente non esiste ancora nel database, quindi lo creiamo
                $user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);
            }
            // Effettuiamo il login dell'utente
            Auth::login($user);
            return redirect()->intended('/');
        } catch (\Throwable $th) {
            dd('Qualcosa è andato storto!' . $th->getMessage());
        }
    }
}
