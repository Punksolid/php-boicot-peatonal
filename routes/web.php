<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribtionsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/subscriptions', [SubscribtionsController::class, 'store'] )->name('subscription.store');
Route::get('/subscriptions/verify', [SubscribtionsController::class, 'verify'] )->name('subscription.verify');
Route::get('/subscriptions/thank_you', [SubscribtionsController::class, 'show'] )->name('subscription.show');
require __DIR__.'/auth.php';
