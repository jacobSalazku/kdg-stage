<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InternshipController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [InternshipController::class, 'index'])->name('home');
Route::get('/detail/{id}', [InternshipController::class, 'show'])->name('detail');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [InternshipController::class, 'index'])->name('dashboard');
    Route::get('/new', function(){
        return view('new');
    })->name('new');
    Route::post('/new', [InternshipController::class, 'create'])->name('new');
});

require __DIR__.'/auth.php';
