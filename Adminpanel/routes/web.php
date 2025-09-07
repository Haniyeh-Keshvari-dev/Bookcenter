<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;

Route::get('/',[AdminController::class,'index']);

Route::group(['prefix'=>'sliders'],function (){
    Route::get('/create',[SliderController::class,'create'])->name('sliders.create');
    Route::post('/',[SliderController::class,'store'])->name('sliders.store');
    Route::get('/edit/{id}',[SliderController::class,'edit'])->name('sliders.edit');
    Route::post('/update/{id}',[SliderController::class,'update'])->name('sliders.update');
    Route::get('/delete/{id}',[SliderController::class,'delete'])->name('sliders.delete');
});

