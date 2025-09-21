<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FeatureController;

Route::get('/',[AdminController::class,'index'])->name('dashboard');

Route::group(['prefix'=>'sliders'],function (){
    Route::get('/',[SliderController::class,'index'])->name('sliders.index');
    Route::get('/create',[SliderController::class,'create'])->name('sliders.create');
    Route::post('/',[SliderController::class,'store'])->name('sliders.store');
    Route::get('/{slider}/edit',[SliderController::class,'edit'])->name('sliders.edit');
    Route::put('/{slider}',[SliderController::class,'update'])->name('sliders.update');
    Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

});

Route::group(['prefix'=>'features'],function (){
    Route::get('/',[FeatureController::class,'index'])->name('feature.index');
    Route::get('/create',[FeatureController::class,'create'])->name('feature.create');
    Route::post('/',[FeatureController::class,'store'])->name('feature.store');
    Route::get('/{feature}/edit',[FeatureController::class,'edit'])->name('feature.edit');
    Route::put('/{feature}',[FeatureController::class,'update'])->name('feature.update');
    Route::delete('/{feature}', [FeatureController::class, 'destroy'])->name('feature.destroy');

});
