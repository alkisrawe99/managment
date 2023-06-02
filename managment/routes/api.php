<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('create_user', 'App\Http\Controllers\UserController@store');

Route::get('show_user', 'App\Http\Controllers\UserController@show');
Route::post('update', 'App\Http\Controllers\UserController@update');
Route::post('destroy', 'App\Http\Controllers\UserController@destroy');


Route::post('create_task', 'App\Http\Controllers\TaskController@store');
Route::get('show_task', 'App\Http\Controllers\TaskController@show');
Route::get('show_task_dep', 'App\Http\Controllers\TaskController@show_dep');
Route::post('update_task', 'App\Http\Controllers\TaskController@update');
Route::post('update_task_status', 'App\Http\Controllers\TaskController@update_task_status');
Route::post('destroy_task', 'App\Http\Controllers\TaskController@destroy');



Route::get('get_all_role', 'App\Http\Controllers\RoleController@get_all_role');
Route::post('create_role', 'App\Http\Controllers\RoleController@store');


