<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RoleAssignController;
use App\Http\Controllers\HeadEntryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StoreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth:sanctum', 'verified'])->name('welcome');

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth:sanctum', 'verified'])->name('welcome');
/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
//Route::get('/aprendices/{aprendice}/confirm',[AprendizController::class,'confirm'])->name('aprendices.confirm')->middleware(['auth:sanctum', 'verified']);
Route::post('/apiwareHouses',[InvoiceController::class,'WareHouses'])->middleware(['cors']);
Route::resource('users',UserController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('roleasign', RoleAssignController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('products', ProductController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('categories', CategoryController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('warehouses', WarehouseController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('providers', ProviderController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('entries', HeadEntryController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('invoices', InvoiceController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('customers', CustomerController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('stores', StoreController::class)->middleware(['auth:sanctum', 'verified']);
