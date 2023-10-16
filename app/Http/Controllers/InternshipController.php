<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Internship::where('published', 1)->get();

        return view('internships', [
            'companies' => $companies,
            'filtered' => 0
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
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);


        $internship = Internship::firstOrNew(['email' => $request->email]);
        $internship->user_id = Auth::user()->id;
        $internship->company = $request->company;
        $internship->email = $request->email;
        $internship->phone_number = $request->phone_number;
        $internship->website = $request->website;

        if ($request->published === 'on'){
            $internship->published = 1;
            $internship->save();
        }else{
            $internship->published = 0;
            $internship->save();
        }

        $selectedSkills = $request->input('skills', []);

        foreach ($selectedSkills as $skill){
            $tag = Tag::where('name', $skill)->first();
            DB::table('tag_internship')->insert([
                'internship_id' => $internship->id,
                'tag_id' => $tag->id,
            ]);

        }

        return redirect('dashboard');
    }
}
