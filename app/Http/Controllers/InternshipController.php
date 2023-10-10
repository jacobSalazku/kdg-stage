<?php

namespace App\Http\Controllers;

use App\Models\internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $uri = request()->route()->getName();

        switch ($uri){
            case 'dashboard':
                $jobs = internship::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(3);

                return view('dashboard', [
                    'jobs' => $jobs,
                ]);
            case 'jobs':
                $jobs = internship::orderBy('created_at', 'desc')->paginate(4);

                return view('welcome', [
                    'jobs' => $jobs,
                    'filtered' => 0
                ]);
            case 'home':
                $companies = user::get();

                return view('internships', [
                    'companies' => $companies,
                    'filtered' => 0
                ]);
            case 'search':
                $jobs = internship::where('title', 'like', '%'. $request->input('query') . '%')->paginate(3);

                return view('welcome', [
                    'jobs' => $jobs,
                    'filtered' => 1
                ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'min:305','string'],
            'website' => ['required', 'url:https', 'max:255'],
        ]);

        $internship = new internship();

        $internship->title = $request->title;
        $internship->description = $request->description;
        $internship->website = $request->website;
        $internship->user_id = Auth::user()->id;

        $internship->save();

        return redirect()->route('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $job = internship::where('id', $id)->get();

        return view('detail', [
            'jobs' => $job,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $internship = internship::find($id);

        if ($internship->user_id !== Auth::user()->id){
            return redirect('home');
        }

        return view('edit', [
            'internship' => $internship,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'min:305','string'],
            'website' => ['required', 'url:https', 'max:255'],
        ]);

        $internship = internship::find($request->id);

        $internship->title = $request->title;
        $internship->description = $request->description;
        $internship->website = $request->website;
        $internship->user_id = Auth::user()->id;

        $internship->save();

        return redirect('dashboard');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $internship = internship::find($id);

        if ($internship->user_id !== Auth::user()->id){
            return redirect('home');
        }

        $internship->delete();

        return redirect('dashboard');
    }
}
