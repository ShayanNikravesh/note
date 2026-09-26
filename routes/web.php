<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::resources([
    'notes' => NoteController::class,
]);

