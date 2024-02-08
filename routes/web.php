<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\TwitterController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('chirps', ChirpController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::get('/posts', function () {
    return Inertia::render('Chirps/Post');
})->middleware(['auth', 'verified'])->name('posts');

Route::get('linkedin/redirect', [LinkedInController::class, 'redirectToLinkedIn'])->name('linkedin.redirect');
Route::get('auth/linkedin/callback', [LinkedInController::class, 'linkedinCallback']);
Route::post('linkedin/postOnlinkedin', [LinkedinController::class, 'postonlinkedin'])->name('linkedin.postOnlinkedin');
Route::get('linkedin/getposts', [LinkedInController::class, 'getAllPosts']);


Route::get('auth/twitter', [TwitterController::class, 'loginwithTwitter']);
Route::get('auth/twitter/callback', [TwitterController::class, 'twitterCallback']);
Route::get('refreshtoken',[TwitterController::class,'getrefreshToken']);
Route::get('me',[TwitterController::class,'getme']);
Route::post('twitter/postOnTwitter',[TwitterController::class,'postOnTwitter'])->name('twitter.postOnTwitter');
require __DIR__.'/auth.php';
