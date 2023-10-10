<?php
namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        switch ($provider){
            case 'microsoft':
                $user->provider_id = $providerUser->getId();
                $user->email = $providerUser->mail;
                $user->save();
                break;

            case 'github':
                $user->provider_id = $providerUser->getId();
                $user->email = $providerUser->email;
                $user->save();
                break;
        }



        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
