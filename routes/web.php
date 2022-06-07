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


// Route::get('/test', function(){
//     return view('test');
// });


// Route::get('/user', 'App\Http\Controllers\Controller@index');


// Route::resource('dogs', DogController::class);
// Route::get('/dog', 'App\Http\Controllers\DogController@index');
// Route::post('/dog', 'App\Http\Controllers\DogController@index');

// Route::resource('cars', 'App\Http\Controllers\CarController');
// Route::post('/cars/store', 'App\Http\Controllers\CarController@store');
// Route::get('cars/delete/{car}', 'App\Http\Controllers\CarController@delete')->name('cars.delete');
// Route::post('cars/delete', 'App\Http\Controllers\CarController@deleteByAjax');

Route::get('/', function(){
    return redirect()->route('dashboard');
});

Auth::routes();

// Logout
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::group([
    'prefix' => 'backend',
    'middleware' => ['auth'],
    'namespace' => 'App\Http\Controllers\Backend'
], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('admins', 'AdminController');
    Route::resource('users', 'UserController');
    Route::post('admins/deleteByAjax', 'AdminController@deleteByAjax');
    Route::resource('templates', 'TemplateController');
    Route::post('templates/deleteByAjax', 'TemplateController@deleteByAjax');
    Route::resource('hosts', 'HostController');
    Route::post('hosts/deleteByAjax', 'HostController@deleteByAjax');
});

    Route::resource('logs','App\Http\Controllers\LogController');