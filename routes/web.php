<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\MagicLinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\ProspectVotesController;
use App\Http\Controllers\SubscribtionsController;
use App\Http\Controllers\UrlShortener;
use App\Models\Prospect;
use App\Models\Subscription;
use App\Models\User;
use App\Services\GetFeaturedProspectOfTheMonth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use MagicLink\Actions\LoginAction;
use MagicLink\MagicLink;

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
// get all urls that start with 1 and redirect to the original url
Route::get('/{slug}', [UrlShortener::class, 'redirect'])->where('slug', '1[0-9A-Za-z]{5}');
Route::get('/', function (GetFeaturedProspectOfTheMonth $getFeaturedProspectOfTheMonth) {
    $prospect = $getFeaturedProspectOfTheMonth->getFeaturedProspectOfTheMonth();
    return view('welcome')->with(['prospect' => $prospect]);
});

Route::post('/subscription', (new SubscribtionsController())->store(...))->name('subscription.store');
Route::get('/subscription/verify', (new SubscribtionsController())->verify(...))->name('subscription.verify');
Route::get('/subscription/show', (new SubscribtionsController())->show(...))->name('subscription.show');
Route::get('/preguntas/como_funciona_el_sistema_de_votacion_cuadratica', [FaqController::class, 'show'])->name('faq.voting.system');

Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('prospects', ProspectController::class)->middleware('verified');
    Route::post('prospects/{prospect}/votes/downvote', [ProspectVotesController::class, 'downvote'])->name('votes.downvote')->middleware('verified');
    Route::resource('prospects/{prospect}/votes', ProspectVotesController::class)->middleware('verified');

    Route::get('/profile', (new ProfileController())->edit(...))->name('profile.edit');
    Route::patch('/profile', (new ProfileController())->update(...))->name('profile.update');
    Route::delete('/profile', (new ProfileController())->destroy(...))->name('profile.destroy');
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

Route::post('/login/magic', [MagicLinkController::class, 'sendEmail'])->name('login.magic');





Route::get('login', fn() => view('auth.login'))->name('login');
require __DIR__.'/auth.php';
