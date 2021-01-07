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

// Route::get('/', function () {
//    return view('welcome');
// });

//Student Route
Route::get('student', 'StudentController@showForm');
Route::post('student-add', 'StudentController@insertStudent');
//Student data show Route
Route::get('student-all', 'StudentController@allStudent');
//Single student data show Route
Route::get('student-single/{id}', 'StudentController@singleStudent');


