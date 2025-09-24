<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\CategoryController;


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

Route::group(['prefix'=>'about'],function (){
    Route::get('/',[AboutController::class,'index'])->name('about.index');
    Route::get('/{about}/edit',[AboutController::class,'edit'])->name('about.edit');
    Route::put('/{about}',[AboutController::class,'update'])->name('about.update');

});

Route::group(['prefix'=>'contact'],function (){
    Route::get('/',[ContactUsController::class,'index'])->name('contact.index');
    Route::get('/{contact}',[ContactUsController::class,'show'])->name('contact.show');
    Route::delete('/{contact}',[ContactUsController::class,'destroy'])->name('contact.destroy');

});

Route::group(['prefix'=>'footer'],function (){
    Route::get('/',[FooterController::class,'index'])->name('footer.index');
    Route::get('/{footer}/edit',[FooterController::class,'edit'])->name('footer.edit');
    Route::put('/{footer}',[FooterController::class,'update'])->name('footer.update');

});

Route::group(['prefix'=>'categories'],function (){
    Route::get('/',[CategoryController::class,'index'])->name('category.index');
    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/',[CategoryController::class,'store'])->name('category.store');
    Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/{category}',[CategoryController::class,'update'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

});


