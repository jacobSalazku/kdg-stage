<?php

namespace App\Http\Controllers;

use App\Models\internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $internships = internship::where('user_id', Auth::user()->id)->get();

        return view('dashboard', [
            'internships' => $internships,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'website' => ['required', 'string', 'max:255'],
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
    public function show(internship $internship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(internship $internship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, internship $internship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(internship $internship)
    {
        //
    }
}
