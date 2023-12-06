<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(NoteController::Class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/', 'index')->name('main');
    Route::get('/create', 'create')->name('note.create');
    Route::post('/create', 'store')->name('note.store');
    Route::get('/edit/{id}', 'edit')->name('note.edit');
    Route::patch('/edit/{id}', 'update')->name('note.update');
    Route::delete('/delete/{id}', 'destroy')->name('note.destroy');
});

Route::prefix('/archive')->controller(ArchiveController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', 'index')->name('archive.main');
    Route::post('/{id}', 'restore')->name('archive.restore');
    Route::delete('/{id}', 'archive')->name('archive.archive');
});

Route::prefix('/profile')->controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/', 'edit')->name('profile.edit');
    Route::patch('/','update')->name('profile.update');
    Route::delete('/','destroy')->name('profile.destroy');
});

require __DIR__.'/auth.php';
