<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');

/* ## Drives Routes ## */
// ## Display
Route::get('drives', "DriveController@index")->name('drives.index');
// ## Create
Route::get('drive/create', "DriveController@create")->name('drives.create');
// ## insert
Route::post('drive/create', "DriveController@store")->name('drives.store');
// ## display 1 item
Route::get('drive/show/{id}', "DriveController@show")->name('drives.show');
// ## edit page
Route::get('drive/edit/{id}', "DriveController@edit")->name('drives.edit');
// ## update
Route::post('drive/edit/{id}', "DriveController@update")->name('drives.update');
// ## Destroy
Route::get('drive/delete/{id}', "DriveController@destroy")->name('drives.destroy');
// ## Download
Route::get('drive/download/{id}', "DriveController@download")->name('drives.download');
