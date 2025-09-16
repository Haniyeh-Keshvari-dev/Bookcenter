<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;

Route::get('/',[AdminController::class,'index'])->name('dashboard');

Route::group(['prefix'=>'sliders'],function (){
    Route::get('/',[SliderController::class,'index'])->name('sliders.index');
    Route::get('/create',[SliderController::class,'create'])->name('sliders.create');
    Route::post('/',[SliderController::class,'store'])->name('sliders.store');
    Route::get('/{slider}/edit',[SliderController::class,'edit'])->name('sliders.edit');
    Route::put('/{slider}',[SliderController::class,'update'])->name('sliders.update');
    Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

});

