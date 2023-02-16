<?php

use App\Http\Controllers\Api\TemporaryFilesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', fn(Request $request) => $request->user());
// @TODO Add only for authenticated users
Route::post('/files/temporary', [TemporaryFilesController::class, 'store'])
    ->name('temporary-files.store');

Route::delete('/files/temporary', [TemporaryFilesController::class, 'destroy'])
    ->name('temporary-files.destroy');
