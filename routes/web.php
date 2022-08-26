<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController,RoleController,PermissionController,OutletController};

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

Route::get('/', function () {  return view('welcome'); });
Auth::routes();
//Route::resource(user, UserController);

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/create', 'create')->name('user.create');
    Route::post('/user/save', 'store')->name('user.store');
    Route::get('/user/edit/{id}', 'edit')->name('user.edit');
    Route::put('/user/update/{id}', 'update')->name('user.update');
    Route::delete('/user/destroy/{id}', 'destroy')->name('user.destroy');
});

Route::controller(RoleController::class)->group(function () {
    Route::get('/role', 'index')->name('role.index');
    Route::get('/role/create', 'create')->name('role.create');
    Route::post('/role/save', 'store')->name('role.store');
    Route::get('/role/edit/{id}', 'edit')->name('role.edit');
    Route::PUT('/role/update/{id}', 'update')->name('role.update');
    Route::delete('/role/destroy/{id}', 'destroy')->name('role.destroy');
});
Route::controller(PermissionController::class)->group(function () {
    Route::get('/permission', 'index')->name('permission.index');
    Route::get('/permission/create',  'create')->name('permission.create');
    Route::post('/permission/save',  'store')->name('permission.store');
    Route::get('/permission/edit/{id}', 'edit')->name('permission.edit');
    Route::PUT('/permission/update/{id}', 'update')->name('permission.update');
    Route::delete('/permission/destroy/{id}', 'destroy')->name('permission.destroy');
});
Route::controller(OutletController::class)->group(function () {
    Route::get('/outlet', 'index')->name('outlet.index');
    Route::get('/outlet/create',  'create')->name('outlet.create');
    Route::post('/outlet/save',  'store')->name('outlet.store');
    Route::get('/outlet/edit/{id}', 'edit')->name('outlet.edit');
    Route::PUT('/outlet/update/{id}', 'update')->name('outlet.update');
    Route::delete('/outlet/destroy/{id}', 'destroy')->name('outlet.destroy');
});

Auth::routes(['register'=>false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

