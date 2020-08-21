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


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    
    //admin route
    Route::middleware(['admin'])->namespace('Admin')->group(function(){
        
        // admin all route here...

        Route::group(['prefix' => 'patient'], function () {
        	// see all user....
     	});
        Route::group(['prefix' => 'users'], function () {
        	// see all user....
     	});
    });

    Route::middleware('doctor')->namespace('Doctor')->group(function () {
    	//doctor all route here...
    });

    Route::middleware('patient')->namespace('Patient')->group(function () {
    	//patient all route here...
    });
    
});




Route::group(array('middleware'=>['auth']), function() {

		Route::get('backup', ['as' => 'hospital.backup', 'uses' => 'HospitalController@backup']);
		Route::get('/',['as'=>'dashboard.index', 'uses'=>'DashboardController@index']);
		Route::get('setting',['as' => 'hospital.setting', 'uses' => 'HospitalController@setting']);
		Route::post('change/password', ['as'=>'change.password', 'uses'=>'UserController@changePassword']);
		Route::post('hospital/update/{id}', ['as'=>'hospital.update', 'uses'=>'HospitalController@updateHospital']);
		Route::post('tax/update/{id}', ['as'=>'tax.update', 'uses'=>'HospitalController@updateTax']);
		Route::post('config/update/', ['as'=>'config.update', 'uses'=>'HospitalController@updateConfig']);
		// User Route
		Route::get('user',['as'=>'user.index', 'uses' => 'UserController@index']);
		Route::post('user', ['as'=>'user.store', 'uses'=> 'UserController@store']);
		Route::post('user/edit/', ['as'=>'user.edit', 'uses'=> 'UserController@edit']);
		Route::post('user/delete/', ['as'=>'user.delete', 'uses'=> 'UserController@delete']);
		// Department Route
		Route::get('department/', ['as'=>'department.index', 'uses'=>'DepartmentController@getIndex']);
		Route::post('department/add', ['as'=>'department.add', 'uses'=>'DepartmentController@store']);
		Route::post('department/edit', ['as'=>'department.edit', 'uses'=>'DepartmentController@edit']);
		Route::post('department/delete',['as'=>'department.delete','uses'=>'DepartmentController@delete']);
		//Services Route
		Route::get('service/', ['as'=>'service.index', 'uses'=>'ServiceController@getIndex']);
		Route::post('service/add', ['as'=>'service.add', 'uses'=>'ServiceController@store']);
		Route::post('service/edit', ['as'=>'service.edit', 'uses'=>'ServiceController@edit']);
		Route::post('service/delete',['role'=>'service.delete','uses'=>'ServiceController@delete']);
		//old controller
		Route::resource('employee', 'EmployeeController');
		Route::resource('doctor', 'DoctorController');
		Route::resource('doctor', 'DoctorController');
		Route::resource('patient', 'PatientController');
		Route::resource('appointment', 'AppointmentController');
		Route::resource('role', 'RoleController');
Route::post('appointment/updated',['as'=>'appointment.updated','uses'=>'AppointmentController@updated']);
		
		
	});
