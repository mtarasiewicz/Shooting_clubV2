<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TournamentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::name('users.')->prefix('users')->group(
    function(){
        Route::get('',[UserController::class, 'index'])
            ->name('index')
            ->middleware(['permission:users.index']);
    });
     Route::resource('tournaments', TournamentController::class)->only([
        'index','create','edit'
    ]);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('tournaments/{tournament}/participants', [TournamentController::class, 'participants'])->name('participants');
    Route::get('tournaments/{tournament}/participants/register/{participant}', [TournamentController::class, 'registerParticipant'])->name('registerParticipant');
    Route::get('tournaments/{tournament}/participants/unregister/{participant}', [TournamentController::class, 'unregisterParticipant'])->name('unregisterParticipant');

    Route::resource('legend_items', LegendController::class)->only([
        'index','create','edit'
    ]);

require __DIR__.'/auth.php';
