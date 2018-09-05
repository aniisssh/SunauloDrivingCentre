<?php

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

Route::get('/home', function () {
    return view('home');
});

Route::group(['prefix'=>'/admin','middleware'=>'auth'],function(){
    Route::resource('/courses','CourseController');
    Route::resource('/trainers','TrainersController');
    Route::resource('/enquiries','EnquireesController');
    Route::resource('/bookings','BookingController');
    Route::resource('/shifts','ShiftController');
    Route::resource('/vehicles','VehicleController');
    Route::resource('/durationtypes','DurationTypeController');
    Route::resource('/dashboard','DashboardController');
    Route::get('/usersajax','DatatablesController@getUserAjax');
    Route::get('/usersdata','DatatablesController@getUserData');

    // Route::controller('datatables', 'DatatablesController', [
    //     'anyData'  => 'datatables.data',
    //     'getIndex' => 'datatables',
    // ]);
});
