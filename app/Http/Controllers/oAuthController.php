<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class oAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        $redirectUrl = route('oauth.callback', ['provider' => $provider]);

        return Socialite::driver($provider)->redirectUrl($redirectUrl)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $redirectUrl = route('oauth.callback', ['provider' => $provider]);
        $providerUser = Socialite::driver($provider)->redirectUrl($redirectUrl)->user();

        $user = User::firstOrNew(['email' => $providerUser->getEmail()]);

        switch ($provider) {
            case 'microsoft':
                $user->provider_id = $providerUser->getId();
                $user->email = $providerUser->mail;
                $user->name = $providerUser->name;
                $user->company = $providerUser->user['officeLocation'] ?? '??';
                $user->save();
                break;

            case 'github':
                $user->provider_id = $providerUser->getId();
                $user->email = $providerUser->email;
                $user->name = $providerUser->nickname;
                $user->company = $providerUser->user['company'] ?? '??';
                $user->save();
                break;

            case 'google':
                $user->provider_id = $providerUser->getId();
                $user->email = $providerUser->email;
                $user->name = $providerUser->name;
                $user->company = '??';
                $user->save();
                break;
        }

        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
