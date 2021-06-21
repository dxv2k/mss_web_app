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
Route::get('/files/{id}', function(){ 
    $files = \App\Models\File::all(); 
    foreach($files as $file){ 
        echo "<h6>".$file-> name."</h6>";  
        echo "<h6>".$file-> user_id."</h6>";  
    }
}); 


Route::resource('files'FileUploadController::class); 