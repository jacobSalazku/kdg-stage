<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $response = $request->get('cf-turnstile-response');
        $ip = $request->ip();

        $captcha = $this->checkCaptcha($ip, $response);

        if ($captcha) {
            $request->user()->save();

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'email' => ['required', 'email'],
        ]);

        $user = $request->user();

        if ($request->email === Auth::user()->email) {
            $response = $request->get('cf-turnstile-response');
            $ip = $request->ip();

            $captcha = $this->checkCaptcha($ip, $response);

            if ($captcha) {
                Auth::logout();

                $user->delete();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return Redirect::to('/');
            }

            return Redirect::to('/profile');
        }

        return Redirect::to('/profile');
    }

    private function checkCaptcha($ip, $response): bool
    {
        $data = [
            'secret' => env('TURNSTILE_SECRET_KEY'),
            'response' => $response,
            'ip' => $ip,
        ];

        $request = Http::post('https://challenges.cloudflare.com/turnstile/v0/siteverify', $data);

        $responseData = $request->json();

        if (isset($responseData['success']) && $responseData['success'] === true) {
            return true;
        } else {
            return false;
        }
    }
}
