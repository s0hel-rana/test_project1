<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupplierController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('home');
    Route::get('/supplier_add',[SupplierController::class,'addSuppliser'])->name('supplier.add');
    Route::post('/new_supplier',[SupplierController::class,'saveSuppliser'])->name('new.supplier');

    Route::get('/supplier_list',[SupplierController::class,'manageSuppliser'])->name('supplier.list');

    Route::get('/status/{id}', [SupplierController::class, 'status'])->name('status');
    Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('edit');
    Route::post('/update', [SupplierController::class, 'updateSupplier'])->name('update.supplier');

    Route::post('/delete', [SupplierController::class, 'delete'])->name('delete');


});
