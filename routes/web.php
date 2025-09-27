<?php

use App\Http\Controllers\LetterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('letters.index');
});

// Letters Routes
Route::resource('letters', LetterController::class);
Route::get('letters/{letter}/download', [LetterController::class, 'download'])
    ->name('letters.download');

// Categories Routes
Route::resource('categories', CategoryController::class);

// About Routes
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index')->name('about.index');
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');
});

