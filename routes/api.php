<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\MenuController;

// Component routes
// Navbar
Route::get('/navbars', [NavbarController::class, 'index']);
Route::post('/navbars', [NavbarController::class, 'store']);
Route::put('/navbars/{id}', [NavbarController::class, 'update']);
Route::delete('/navbars/{id}', [NavbarController::class, 'destroy']);

// Menus
Route::get('/menus', [MenuController::class, 'index']);
Route::post('/menus', [MenuController::class, 'store']);
Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');
Route::delete('/menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');

// Menu Items
Route::get('menuitems', [MenuItemController::class, 'index']);
Route::post('menuitems', [MenuItemController::class, 'store']);
Route::put('menuitems/{menuItem}', [MenuItemController::class, 'update']);
Route::delete('menuitems/{menuItem}', [MenuItemController::class, 'destroy']);


// Footer
Route::get('/footers', [FooterController::class, 'index']);
Route::post('/footers', [FooterController::class, 'store']);
Route::put('/footers/{id}', [FooterController::class, 'update']);
Route::delete('/footers/{id}', [FooterController::class, 'destroy']);

// Slider
Route::get('/sliders', [SliderController::class, 'index']);
Route::post('/sliders', [SliderController::class, 'store']);
Route::put('/sliders/{id}', [SliderController::class, 'update']);
Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);

// Card
Route::get('/cards', [CardController::class, 'index']);
Route::post('/cards', [CardController::class, 'store']);
Route::put('/cards/{id}', [CardController::class, 'update']);
Route::delete('/cards/{id}', [CardController::class, 'destroy']);

// Form
Route::get('/forms', [FormController::class, 'index']);
Route::post('/forms', [FormController::class, 'store']);
Route::get('/forms/{id}', [FormController::class, 'show']);
Route::put('/forms/{id}', [FormController::class, 'update']);
Route::delete('/forms/{id}', [FormController::class, 'destroy']);

// Media
Route::get('/media', [MediaController::class, 'index']);
// Route::post('/media', [MediaController::class, 'store']);
// Route::put('/media/{id}', [MediaController::class, 'update']);
// Route::delete('/media/{id}', [MediaController::class, 'destroy']);

// Image
// Route::controller(ImageController::class)->group(function(){
//     Route::get('image-upload', 'index');
//     Route::post('image-upload', 'store')->name('image.store');
// });

// Route::get('/image-upload', [ImageController::class, 'index']);
// Route::post('/image-upload', [ImageController::class, 'store'])->name('image.store');
// Route::put('/image-upload/{id}', [ImageController::class, 'update']);
// Route::delete('/image-upload/{id}', [ImageController::class, 'destroy']);

// Page routes
// About us
