<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'view']);
Route::post('/contacts',[ContactsController::class, 'submit']);
Route::get('/contacts/list',[ContactsController::class, 'list']);
Route::get('/contacts/list/delete/{id}',[ContactsController::class, 'delete']);
Route::get('/contacts/list/edit/{id}',[ContactsController::class, 'edit']);
Route::post('/contacts/list/edit/{id}',[ContactsController::class, 'editContact']);