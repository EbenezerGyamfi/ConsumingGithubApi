<?php

use App\Http\Controllers\TodoController;
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


Route::get('/todo', [TodoController::class, 'index'])->name('todo');


Route::get('/todo-list/{todoList}', [TodoController::class, 'show'])->name('single.todo');

Route::post('/todo-list', [TodoController::class, 'store'])->name('todo.store');

Route::delete('/todo/delete/{todoList}', [TodoController::class, 'delete'])->name('todo.delete');

Route::patch('/todo/edit/{todoList}', [TodoController::class, 'edit'])->name('todo.edit');