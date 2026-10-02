<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('register',function(){
    return view('register');
})->name('register');

Route::post('/login',[LoginController::class,'authenticate'])->name('sign_in');

Route::post('/signup',[LoginController::class,'signup'])->name('sign_up');

Route::middleware('auth:web')->group(function () {

    Route::resources([
        'notes' => NoteController::class,
    ]);

    Route::post('notes/ChangeStatus/{id}',[NoteController::class,'ChangeStatus'])->name('change_Status');

    Route::post('/logout',[LoginController::class,'logout'])->name('logout');

});





