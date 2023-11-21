<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rules\In;
use App\Notifications\NewInternshipCreated;
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
            $companies = Internship::where('published', 1)->where('offer', 1)->paginate(8);
        } elseif ($filter !== null) {
            $companies = Internship::where('published', 1)->whereHas('tags', function ($query) use ($filter) {
                $query->where('name', '=', $filter);
            })->paginate(8);
        }


        $tags = Tag::all();

        return view('internships', [
            'companies' => $companies,
            'tags' => $tags
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
            'phone_number' => ['nullable','numeric', 'digits_between:9,10'],
            'email' => ['required', 'email', 'max:255'],
            'skills' => ['required', 'array']
        ]);


        $internship = Internship::firstOrNew(['email' => $request->email]);

        $internship->user_id = Auth::user()->id;
        $internship->company = $request->company;
        $internship->email = $request->email;
        $internship->contact = $request->contact;
        $internship->phone_number = $request->phone_number;
        $internship->website = $request->website;

        if (!$internship->exists) {
            $admins = User::where('role', 'admin')->get();

            foreach ($admins as $admin) {
                Notification::route('mail', $admin->email)->notify(new NewInternshipCreated($internship->company, $internship->contact));
            }
        }

        if ($request->offer === 'on') {
            $internship->offer = 1;
            $internship->save();
        } else {
            $internship->offer = 0;
            $internship->save();
        }

        $selectedSkills = $request->input('skills', []);
        $tagIds = Tag::whereIn('name', $selectedSkills)->pluck('id');
        $internship->tags()->sync($tagIds);

        $lang = Config::get('app.locale');

        return redirect('/'.$lang.'/dashboard')->with('message', Lang::get('form.internship-update'));
    }
}
