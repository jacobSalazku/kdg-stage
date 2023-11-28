<?php

use App\Http\Controllers\InternshipController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\oAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get(LaravelLocalization::transRoute('routes.home'), [InternshipController::class, 'index'])->name('home');
    Route::get(LaravelLocalization::transRoute('routes.jobs'), [JobController::class, 'index'])->name('jobs');
    Route::get(LaravelLocalization::transRoute('routes.detail'), [JobController::class, 'show'])->name('detail');
    Route::get(LaravelLocalization::transRoute('routes.search'), [JobController::class, 'index'])->name('search');

    Route::get('oauth/login/{provider}', [oAuthController::class, 'redirectToProvider'])->name('oauth.login');
    Route::get('oauth/callback/{provider}', [oAuthController::class, 'handleProviderCallback'])->name('oauth.callback');

    Route::middleware(['auth'])->group(function () {
        Route::get(LaravelLocalization::transRoute('routes.profile'), [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch(LaravelLocalization::transRoute('routes.profile'), [ProfileController::class, 'update'])->name('profile.update');
        Route::delete(LaravelLocalization::transRoute('routes.profile'), [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get(LaravelLocalization::transRoute('routes.dashboard'), [JobController::class, 'index'])->name('dashboard');

        Route::get(LaravelLocalization::transRoute('routes.new'), function () {
            return view('new');
        })->name('new');
        Route::post(LaravelLocalization::transRoute('routes.new'), [JobController::class, 'create'])->name('new');

        Route::get(LaravelLocalization::transRoute('routes.edit'), [JobController::class, 'edit'])->name('edit');
        Route::post(LaravelLocalization::transRoute('routes.edit'), [JobController::class, 'update'])->name('update');

        Route::post(LaravelLocalization::transRoute('routes.delete'), [JobController::class, 'destroy'])->name('delete');

        Route::post(LaravelLocalization::transRoute('routes.create-internship'), [InternshipController::class, 'update'])->name('create_internship');
    });
});

require __DIR__.'/auth.php';
