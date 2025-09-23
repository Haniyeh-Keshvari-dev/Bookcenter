<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::get('/about_us', function () {
    return view('about');
})->name('about.index');

Route::get('/contact_us', function () {
    return view('contact');
})->name('contact.index');

Route::post('/contact_us',[ContactUsController::class,'store'])->name('contact.store');
