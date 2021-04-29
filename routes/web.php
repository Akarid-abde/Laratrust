<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\UserController;

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

Route::get('/index', function () {
    return view('index');
});

/*Route::get('/dashbord', function () {
    return view('dashbord');
});*/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::resource('users','UserController');
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/client','ClientController@index')->name('client');
Route::get('/super','SuperController@index')->name('super');
/*Route::resource('admin','AdminController');*/


/*Route::get('super',[SuperController::class,'index']);*/
Route::get('super/create',[SuperController::class,'create']);
Route::post('super',[SuperController::class,'store']);
Route::get('super/{id}/edit',[SuperController::class,'edit']);
Route::put('super/{id}',[SuperController::class,'update']);
Route::delete('super/{id}',[SuperController::class,'destroy']);
/*Route::delete('/super/{id}',[SuperController::class,'destroy']);*/

Route::get('dashbord',[UserController::class,'dashbord']);


