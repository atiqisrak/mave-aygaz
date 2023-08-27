<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\FooterController;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutPageController;

Route::group(['prefix' => '{language?}'], function () {

    Route::get('/sliders', [SliderController::class, 'index']);
    Route::post('/sliders', [SliderController::class, 'store']);
    Route::put('/sliders/{id}', [SliderController::class, 'update']);
    Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);

    Route::get('/cards', [CardController::class, 'index']);
    Route::post('/cards', [CardController::class, 'store']);
    Route::put('/cards/{id}', [CardController::class, 'update']);
    Route::delete('/cards/{id}', [CardController::class, 'destroy']);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mediaUpload', [MediaController::class, 'showMediaUploadForm'])->name('media.upload');
Route::post('/mediaUpload', [MediaController::class, 'store'])->name('media.store');

Route::get('/cards', [CardController::class, 'indexView'])->name('cards.index.view');
Route::get('/sliders', [SliderController::class, 'indexView'])->name('sliders.index.view');
Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');

Route::get('/navbar', [NavbarController::class, 'indexView'])->name('navbar.indexView');
Route::get('/footer', [FooterController::class, 'indexView'])->name('footer.indexView');


// ----------- Pages ----------------
Route::get('/home', [HomepageController::class, 'indexView'])->name('home.indexView');
Route::get('/about', [AboutPageController::class, 'indexView'])->name('about.indexView');