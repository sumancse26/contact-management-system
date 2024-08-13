<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', [ContactController::class, 'getAllContact'])->name('home');
Route::get('/contacts', [ContactController::class, 'getAllContact'])->name('get.contact');
Route::get('/contacts/create', [ContactController::class, 'navigateToContactForm'])->name('create.form');
Route::post('/contacts', [ContactController::class, 'saveContact'])->name('save.contact');
Route::get('/contacts/{id}', [ContactController::class, 'showSingleContact'])->name('show.contact');
Route::get('/contacts/{id}/edit', [ContactController::class, 'getSingleContact'])->name('edit.contact');
Route::put('/contacts/{id}', [ContactController::class, 'updateContact'])->name('update.contact');
Route::delete('/contacts/{id}', [ContactController::class, 'deleteContact'])->name('delete.contact');
Route::get('/search', [ContactController::class, 'searchContact'])->name('search.contact');
