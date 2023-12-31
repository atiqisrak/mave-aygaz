<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\NavbarController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\MenuController;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\CylinderGasController;
use App\Http\Controllers\AutogasPageController;
use App\Http\Controllers\BulkgasPageController;
use App\Http\Controllers\HealthnSafetyController;

// Auth routes
// Roles
Route::get('/roles', [RoleController::class, 'index']);
Route::post('/roles', [RoleController::class, 'store']);
Route::put('/roles/{role}', [RoleController::class, 'update']);
Route::delete('/roles/{role}', [RoleController::class, 'destroy']);

// Permissions
Route::get('/permissions', [PermissionController::class, 'index']);
Route::post('/permissions', [PermissionController::class, 'store']);
Route::put('/permissions/{permission}', [PermissionController::class, 'update']);
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy']);

// assign permission to role api
Route::post('/assignpermissions', [RoleController::class, 'assignPermissions']);

// Component routes
// Navbar
Route::get('/navbars', [NavbarController::class, 'index']);
Route::post('/navbars', [NavbarController::class, 'store']);
Route::put('/navbars/{navbar}', [NavbarController::class, 'update']);
Route::delete('/navbars/{navbar}', [NavbarController::class, 'destroy']);

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


// --------------- Pages  -------------------
// Home
Route::get('/home', [HomepageController::class, 'index']);
Route::post('/home', [HomepageController::class, 'store']);
Route::get('/home/{id}', [HomepageController::class, 'show']);
Route::put('/home/{id}', [HomepageController::class, 'update']);
Route::delete('/home/{id}', [HomepageController::class, 'destroy']);

// About
Route::get('/about', [AboutPageController::class, 'index']);
Route::post('/about', [AboutPageController::class, 'store']);
Route::put('/about/{id}', [AboutPageController::class, 'update']);
Route::delete('/about/{id}', [AboutPageController::class, 'destroy']);

// Cylindergas
Route::get('/cylindergas', [CylinderGasController::class, 'index']);
Route::post('/cylindergas', [CylinderGasController::class, 'store']);
Route::put('/cylindergas/{id}', [CylinderGasController::class, 'update']);
Route::delete('/cylindergas/{id}', [CylinderGasController::class, 'destroy']);

// Autogas
Route::get('/autogas', [AutogasPageController::class, 'index']);
Route::post('/autogas', [AutogasPageController::class, 'store']);
Route::put('/autogas/{id}', [AutogasPageController::class, 'update']);
Route::delete('/autogas/{id}', [AutogasPageController::class, 'destroy']);

// Bulk Gas
Route::get('/bulkgas', [BulkgasPageController::class, 'index']);
Route::post('/bulkgas', [BulkgasPageController::class, 'store']);
Route::put('/bulkgas/{id}', [BulkgasPageController::class, 'update']);
Route::delete('/bulkgas/{id}', [BulkgasPageController::class, 'destroy']);

// Health and Safety
Route::get('/healthnsafety', [HealthnSafetyController::class, 'index']);
Route::post('/healthnsafety', [HealthnSafetyController::class, 'store']);
Route::put('/healthnsafety/{id}', [HealthnSafetyController::class, 'update']);
Route::delete('/healthnsafety/{id}', [HealthnSafetyController::class, 'destroy']);