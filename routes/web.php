<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index');
Route::get('/cabinet', 'HomeController@enter')->middleware('auth');
Route::post('/cabinet', 'HomeController@edit');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index');
    Route::get('/permits', 'AdminController@permits');
    Route::post('/permits', 'AdminController@change');
});

Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::get('/home', 'HomeController@index')->name('home');
