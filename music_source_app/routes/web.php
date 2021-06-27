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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/separator',)->name('separator');

Route::get('/separator', function(){ 
    return view('separator'); 
}); 

// This demo test to query 
Route::get('/upload-file', 'App\Http\Controllers\FileUpload@createForm');
Route::post('/upload-file', 'App\Http\Controllers\FileUpload@fileUpload')->name('fileUpload');

// Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');