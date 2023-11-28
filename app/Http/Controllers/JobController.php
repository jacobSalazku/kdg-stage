<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\NewJobCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Notification;

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
                    'tags' => $tags,
                ]);
            case 'jobs':
                $jobs = Job::where('published', 1)->orderBy('created_at', 'desc')->paginate(4);

                return view('jobs', [
                    'jobs' => $jobs,
                    'filtered' => 0,
                ]);

            case 'search':
                $jobs = Job::where('published', 1)->where('title', 'like', '%' . $request->input('query') . '%')->paginate(3);

                return view('jobs', [
                    'jobs' => $jobs,
                    'filtered' => 1,
                ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $job = $this->validateAndSaveJob($request);

        $lang = Config::get('app.locale');

        $response = $request->get('cf-turnstile-response');
        $ip = $request->ip();

        $captcha = $this->checkCaptcha($ip, $response);

        if ($captcha === true) {
            $job->save();
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                Notification::route('mail', $admin->email)->notify(new NewJobCreated($job->title, $job->company, $job->contact));
            }

            return redirect('/' . $lang . '/dashboard')->with('success', Lang::get('form.job-make'));
        }

        return redirect('/' . $lang . '/dashboard')->with('error', Lang::get('form.job-make-error'));
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
            $lang = Config::get('app.locale');

            return redirect('/' . $lang . '/dashboard')->with('error', Lang::get('form.rights'));
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
        $job = Job::find($request->id);
        $job = $this->validateAndSaveJob($request, $job);

        $response = $request->get('cf-turnstile-response');
        $ip = $request->ip();

        $captcha = $this->checkCaptcha($ip, $response);

        $lang = Config::get('app.locale');

        if ($captcha === true) {
            $job->save();

            return redirect('/' . $lang . '/dashboard')->with('success', Lang::get('form.job-update'));
        }

        return redirect('/' . $lang . '/dashboard')->with('error', Lang::get('form.job-update-error'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $id)
    {
        $job = Job::find($id);

        $lang = Config::get('app.locale');

        if ($job->user_id !== Auth::user()->id) {
            return redirect('/' . $lang . '/dashboard')->with('error', Lang::get('form.rights'));
        }

        $response = $request->get('cf-turnstile-response');
        $ip = $request->ip();

        $captcha = $this->checkCaptcha($ip, $response);

        if ($captcha === true) {
            $job->delete();

            return redirect('/' . $lang . '/dashboard')->with('success', Lang::get('form.job-delete'));
        }

        return redirect('/' . $lang . '/dashboard')->with('error', Lang::get('form.job-delete-error'));
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

    private function validateAndSaveJob(Request $request, Job $job = null): object
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'min:305', 'string'],
            'company' => ['required', 'string', 'max:255'],
            'website' => ['required', 'url:https', 'max:255'],
            'phone_number' => ['nullable', 'numeric', 'digits_between:9,10'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        if ($job === null) {
            $job = new Job();
        } else {
            if ($job->user_id !== Auth::id()) {
                $lang = Config::get('app.locale');

                return redirect('/' . $lang . '/dashboard')->with('error', Lang::get('form.rights'));
            }
        }
        $job->title = $request->title;
        $job->description = $request->description;
        $job->company = $request->company;
        $job->contact = $request->contact;
        $job->website = $request->website;
        $job->phone_number = $request->phone_number;
        $job->email = $request->email;
        $job->user_id = Auth::user()->id;

        return $job;
    }
}
