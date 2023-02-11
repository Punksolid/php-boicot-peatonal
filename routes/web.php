<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\SubscribtionsController;
use App\Models\Prospect;
use App\Models\Subscription;
use App\Models\User;
use App\Services\GetFeaturedProspectOfTheMonth;
use Illuminate\Http\JsonResponse;
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

Route::get('/', function (GetFeaturedProspectOfTheMonth $getFeaturedProspectOfTheMonth) {
    $prospect = $getFeaturedProspectOfTheMonth->__invoke();
    return view('welcome')->with(compact('prospect'));
});

Route::post('/subscription', [SubscribtionsController::class, 'store'])->name('subscription.store');
Route::get('/subscription/verify', [SubscribtionsController::class, 'verify'])->name('subscription.verify');
Route::get('/subscription/show', [SubscribtionsController::class, 'show'])->name('subscription.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('prospects', ProspectController::class)->middleware('verified');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// @TODO: Delete the following line after deployment, these are only for testing purposes
// @TODO: Add a proper dashboard
Route::get('/🔥', function () {

    $number_of_subscribers = Subscription::whereNotNull('verified_at')->count();
    $number_of_prospects = Prospect::count();
    return new JsonResponse([
        'subscribers' => $number_of_subscribers,
        'prospects' => $number_of_prospects,
        'users' => User::count(),
    ], 200);

})->name('featured');

Route::get('login', function () {
    return view('auth.login');
})->name('login');
require __DIR__.'/auth.php';
