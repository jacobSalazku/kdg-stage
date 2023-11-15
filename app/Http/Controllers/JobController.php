<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Internship;
use Illuminate\Support\Facades\Lang;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $uri = request()->route()->getName();

        switch ($uri) {
            case 'dashboard':
                $jobs = Job::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(1);
                $internship = Internship::where('user_id', Auth::user()->id)->first();
                $tags = Tag::all();

                return view('dashboard', [
                    'jobs' => $jobs,
                    'internship' => $internship,
                    'tags' => $tags
                ]);
            case 'jobs':
                $jobs = Job::where('published', 1)->orderBy('created_at', 'desc')->paginate(4);

                return view('jobs', [
                    'jobs' => $jobs,
                    'filtered' => 0
                ]);

            case 'search':
                $jobs = Job::where('published', 1)->where('title', 'like', '%' . $request->input('query') . '%')->paginate(3);

                return view('jobs', [
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
            'description' => ['required', 'min:305', 'max:65535', 'string'],
            'company' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'website' => ['required', 'url:https', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits_between:9,10'],
            'email' => ['required', 'email', 'max:255'],

        ]);

        $job = new Job();

        $job->title = $request->title;
        $job->description = $request->description;
        $job->company = $request->company;
        $job->contact = $request->contact;
        $job->website = $request->website;
        $job->phone_number = $request->phone_number;
        $job->email = $request->email;
        $job->user_id = Auth::user()->id;

        $job->save();

        return redirect()->route('dashboard')->with('message', Lang::get('form.job-make'));
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
        $job = Job::where('id', $id)->get();

        return view('detail', [
            'jobs' => $job,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $job = Job::find($id);

        if ($job->user_id !== Auth::user()->id) {
            return redirect('home');
        }

        return view('edit', [
            'job' => $job,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'min:305', 'string'],
            'company' => ['required', 'string', 'max:255'],
            'website' => ['required', 'url:https', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits_between:9,10'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $job = Job::find($request->id);

        if ($job->user_id !== Auth::id()) {
            return redirect('dashboard');
        }

        $job->title = $request->title;
        $job->description = $request->description;
        $job->company = $request->company;
        $job->contact = $request->contact;
        $job->website = $request->website;
        $job->phone_number = $request->phone_number;
        $job->email = $request->email;
        $job->user_id = Auth::user()->id;

        $job->save();

        return redirect('dashboard')->with('message', Lang::get('form.job-update'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $job = Job::find($id);

        if ($job->user_id !== Auth::user()->id) {
            return redirect('dashboard');
        }

        $job->delete();

        return redirect('dashboard')->with('message', Lang::get('form.job-delete'));
    }
}
