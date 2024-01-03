<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\NewInternshipCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Notification;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->filter;

        if ($filter == null) {
            $companies = Internship::where('published', 1)->where('offer', 1)->paginate(6);
            $filtered = 0;
        } else {
            $companies = Internship::where('published', 1)->whereHas('tags', function ($query) use ($filter) {
                $query->where('name', '=', $filter);
            })->get();
            $filtered = 1;
            $filter = $request->filter;
        }

        $tags = Tag::all();

        return view('internships', [
            'companies' => $companies,
            'tags' => $tags,
            'filtered' => $filtered,
            'filter' => $filter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update(Request $request)
    {
        $request->validate([
            'company' => ['required', 'string', 'max:255'],
            'website' => ['required', 'url:https', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'numeric', 'digits_between:9,10'],
            'email' => ['required', 'email', 'max:255'],
            'skills' => ['required', 'array'],
        ]);

        $internship = Internship::firstOrNew(['email' => $request->email]);

        if (! $internship->exists) {
            $notification = 1;
        }

        $internship->user_id = Auth::user()->id;
        $internship->company = $request->company;
        $internship->email = $request->email;
        $internship->contact = $request->contact;
        $internship->phone_number = $request->phone_number;
        $internship->website = $request->website;

        $response = $request->get('cf-turnstile-response');
        $ip = $request->ip();

        $captcha = $this->checkCaptcha($ip, $response);

        $lang = Config::get('app.locale');

        if ($captcha) {
            if ($request->offer === 'on') {
                $internship->offer = 1;
                $internship->save();

                if ($notification === 1) {
                    $admins = User::where('role', 'admin')->get();

                    foreach ($admins as $admin) {
                        Notification::route('mail', $admin->email)->notify(new NewInternshipCreated($internship->company, $internship->contact, $internship->id));
                    }
                }
            } else {
                $internship->offer = 0;
                $internship->save();
            }

            $selectedSkills = $request->input('skills', []);
            $tagIds = Tag::whereIn('name', $selectedSkills)->pluck('id');
            $internship->tags()->sync($tagIds);

            return redirect('/'.$lang.'/dashboard')->with('success', Lang::get('form.internship-update'));
        }

        return redirect('/'.$lang.'/dashboard')->with('error', Lang::get('form.internship-update-error'));
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
