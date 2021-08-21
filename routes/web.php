<?php

use App\Http\Controllers\Panel\ClientsController;
use App\Http\Controllers\Panel\UsersController;
use Illuminate\Support\Facades\Route;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('admin')->group(function () {

    /*
     * Clients
     */
    Route::get('/clients', [ClientsController::class, 'home'])->name('clients.home');
    Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
    Route::get('/clients/edit/{client}', [ClientsController::class, 'edit'])->name('clients.edit');

    /*
     * Users
     */
    Route::get('/users', [UsersController::class, 'home'])->name('users.home');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/users/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');

});
