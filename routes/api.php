<?php

use App\Http\Controllers\GithubController;
use App\Http\Integrations\Github\GithubConnector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/github', [GithubController::class, 'getRepo'])->name('github.getRepo');

Route::get('/github/repo/languages', [GithubController::class, 'getLanguages'])->name('github.getLanguages');

Route::post('/create/repo', [GithubController::class, 'store'])->name('github.create');

Route::patch('/update-repo', [GithubController::class, 'update']);

Route::delete('/delete/repo', [GithubController::class, 'delete']);