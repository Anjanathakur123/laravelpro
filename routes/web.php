<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('home');
});


Route::get('/register', [StudentController::class, 'showForm']);
Route::post('/register', [StudentController::class, 'register'])->name('register');
Route::get('/show', [StudentController::class,'index']);
 Route::get('/edit/{id}', [StudentController::class,'edit'])->name('edit');
 Route::put('/update/{id}', [StudentController::class,'update'])->name('update');
 Route::delete('/destroy/{id}', [StudentController::class,'update'])->name('destroy');

