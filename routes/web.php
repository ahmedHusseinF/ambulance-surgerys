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

Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('Patient','Patient_Controller');

//Route::get('/Patient','Patient_Controller@validateCredentials')

Route::get('Patient/create','Patient_Controller@create');

Route::post('Patient/store', 'Patient_Controller@validateCredentials');

Route::get('Patient/update', 'Patient_Controller@getPatientID');

Route::post('Patient/updatePatient', 'Patient_Controller@findPatient');

//Route::POST('Patient/Save', 'Patient_Controller@update2');
Route::POST('Patient/Save','Patient_Controller@saveUpdates');

Route::resource('NewReservation','SurgeryReservation_Controller');

Route::post('NewReservation/store', 'SurgeryReservation_Controller@store');


//----------------------------------------------------------//
Route::post('NewRequest/store', 'SurgeryQueue_Controller@store');

Route::get('NewRequest','SurgeryQueue_Controller@index');

Route::get('NewRequest/updateRequest', 'SurgeryQueue_Controller@updateRequest');

Route::POST('NewRequest/update', 'SurgeryQueue_Controller@update');
Route::get('NewRequest/deleteRequest', 'SurgeryQueue_Controller@destroy');

//Route::resource('SurgeryRooms','SurgeryRoom_Controller');
Route::get('SurgeryRooms','SurgeryRoom_Controller@index');

Route::get('SurgeryRooms/create','SurgeryRoom_Controller@create');

Route::post('SurgeryRooms/store', 'SurgeryRoom_Controller@store');

Route::post('SurgeryRooms/update', 'SurgeryRoom_Controller@findRoom');

Route::any('SurgeryRooms/updateRoom','SurgeryRoom_Controller@updateRoom');

Route::any('SurgeryRooms/roomFromView','SurgeryRoom_Controller@findRoomFromView');

Route::get('SurgeryRooms/findRoom','SurgeryRoom_Controller@findRoom');


Route::post('SurgeryRooms/edit', 'SurgeryRoom_Controller@editRoom');


//Route::POST('SurgeryRooms/show');

//Route::get('SurgeryRooms/updateRoom' [as => 'updateRooms', 'uses' => 'SurgeryRoom_Controller@updateRoom']);

