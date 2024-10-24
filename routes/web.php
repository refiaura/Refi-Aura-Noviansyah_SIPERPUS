<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BukuController;

// route: /hello
//method: GET

// Route::get('/hello', function (){
//     return 'HELLO PWL-1';
// })->middleware('auth')->name('hello');

// Route::resource('buku', BukuController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku', function () {
    return view('buku.index', $data);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
