<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::view('/', 'login')->name('login');

// Route::get('/', function () {
//     return view('login');
// })->name('login');

Route::get('register',function(){
    return view('register');
})->name('register');

Route::post('/login',[LoginController::class,'authenticate'])->name('sign_in');

Route::post('/signup',[LoginController::class,'signup'])->name('sign_up');

Route::middleware('auth:web')->group(function () {

    // Route::get('/email/verify', function () {
    //     return view('auth.verify-email');
    // })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

        $request->fulfill();

        return redirect('notes');

    })->middleware('signed')->name('verification.verify');

    Route::resources([
        'notes' => NoteController::class,
    ]);

    Route::post('notes/ChangeStatus/{id}',[NoteController::class,'ChangeStatus'])->name('change_Status');

    Route::post('/logout',[LoginController::class,'logout'])->name('logout');

});





