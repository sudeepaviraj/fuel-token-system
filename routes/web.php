<?php

use App\Http\Controllers\PersonController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('find_user','App\Http\Controllers\PersonController@find_user');
Route::post('new_user','App\Http\Controllers\PersonController@new_user');
Route::get('testapi','App\Http\Controllers\PersonController@test');
Route::get('/admin',function (){
    return view('admin.index');
})->middleware('logged_in');
Route::resource('user', PersonController::class);
