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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/data_submit', 'HomeController@insert')->name('submit');
Route::post('/insert_timetable', 'HomeController@insert_timetable')->name('insert_timetable');
Route::get('/final_form/{id}', 'HomeController@final_form')->name('final_form');
// Route::get('/data_submit', function () {
//     $total_sub =6;
//     $totle_h_p =56;
//     $work_day =7;
    
//     return view('second_form' ,compact('totle_h_p','total_sub','work_day'));
// });

