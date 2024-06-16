<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

// Welcome page route
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Home page route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Main page route (using TasksController@index)
Route::get('/index', [TasksController::class, 'index'])->name('index');

// Tasks routes
Route::get('tasks/index', [TasksController::class, 'index'])->name('tasks.index');
Route::get('tasks/create', [TasksController::class, 'create'])->name('tasks.create');
Route::post('tasks/store', [TasksController::class, 'store'])->name('tasks.store');
Route::get('tasks/show/{id}', [TasksController::class, 'show'])->name('tasks.show');
Route::get('tasks/{id}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
Route::put('tasks/update', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('tasks/destroy', [TasksController::class, 'destroy'])->name('tasks.destroy');