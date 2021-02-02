<?php

use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('threads', ThreadController::class);
Route::post('/threads/{thread}/replies', [ReplyController::class, 'store']);
require __DIR__.'/auth.php';
