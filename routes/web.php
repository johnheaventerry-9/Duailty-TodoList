<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

Route::resource('todos', ToDoController::class);
Route::get('/index', [ToDoController::class, 'index']);
