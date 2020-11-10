<?php

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

// We want Laravel to respond to every request, because we'll be using Vue to handle the routing in the front-end.
Route::get('/{any?}', function () {
    return view('welcome');
})->name('home');
