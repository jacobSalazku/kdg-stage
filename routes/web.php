<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\oAuthController;
use App\Http\Controllers\InternshipController;
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
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [InternshipController::class, 'index'])->name('home');
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
    Route::get('/detail/{id}', [JobController::class, 'show'])->name('detail');
    Route::get('/search', [JobController::class, 'index'])->name('search');

    Route::get('oauth/login/{provider}', [oAuthController::class, 'redirectToProvider'])->name('oauth.login');
    Route::get('oauth/callback/{provider}', [oAuthController::class, 'handleProviderCallback'])->name('oauth.callback');

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/dashboard', [JobController::class, 'index'])->name('dashboard');

        Route::get('/new', function(){
            return view('new');
        })->name('new');
        Route::post('/new', [JobController::class, 'create'])->name('new');

        Route::get('/edit/{id}', [JobController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [JobController::class, 'update'])->name('update');

        Route::post('/delete/{id}', [JobController::class, 'destroy'])->name('delete');

        Route::post('/create-internship', [InternshipController::class, 'update'])->name('create_internship');
    });
});

require __DIR__.'/auth.php';
