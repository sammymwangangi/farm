<?php

Route::get('access-denied', function () {
    return view('errors.403');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ************ Deliveries Routes ****************************//
Route::resource(
    'deliveries',
    'DeliveryController', [
        'only' => [
            'edit',
            'update',
            'create',
            'index',
        ],
    ]
);
Route::post('/deliveries','DeliveryController@store')->name('store')->middleware(['permission:MANAGE-DELIVERIES']);
Route::get('/print-deliveries','DeliveryController@print_deliveries');
// ************ END ****************************//


// ************ Dashboard Routes ****************************//
Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/','DashboardController@index');
    Route::get('/users','DashboardController@users')->middleware(['permission:VIEW-USER,require_all']);
    Route::get('/comments','DashboardController@comments')->middleware(['permission:VIEW-COMMENT,require_all']);
    Route::post('/comments','DashboardController@addcomment')->middleware(['permission:CREATE-COMMENT']);
    Route::post('/users','DashboardController@adduser')->middleware(['permission:CREATE-USER']);
    Route::get('/users/{id}','DashboardController@editUser')->middleware(['permission:EDIT-USER,require_all']);
    Route::patch('/users/{id}','DashboardController@updateUser')->middleware(['permission:EDIT-USER']);
    Route::get('/delete-user/{id}','DashboardController@delete_user')->middleware(['permission:DELETE-USER']);
    Route::get('/roles','RoleController@roles')->middleware(['permission:VIEW-ROLES']);
    Route::get('/addrole','RoleController@addrole')->middleware(['permission:CREATE-ROLE']);
    Route::post('/addrole','RoleController@storeRole')->middleware(['permission:CREATE-ROLE']);
    Route::get('/edit-role/{id}','RoleController@editRole')->middleware(['permission:EDIT-ROLE']);
    Route::patch('/edit-role/{id}','RoleController@updateRole')->middleware(['permission:EDIT-ROLE']);
    Route::get('/delete-role/{id}','RoleController@deleteRole')->middleware(['permission:DELETE-ROLE']);
    Route::get('/permissions','RoleController@permissions')->middleware(['permission:VIEW-PERMISSION,require_all']);
    Route::post('/permissions','RoleController@storePermission')->middleware(['permission:CREATE-PERMISSION,require_all']);
    Route::get('/delete-permission/{id}','RoleController@deletePermission')->middleware(['permission:DELETE-PERMISSION,require_all']);

});

//**************Profiles Routes ****************************
Route::prefix('/profile')->middleware('auth')->group(function(){
    Route::get('/passwordChange','ProfileController@changePassword');
    Route::post('/passwordChange/{id}','ProfileController@postChangePassword');
    Route::get('/editProfile/{id}','ProfileController@editprofile');
    Route::post('/editprofile/{id}','ProfileController@posteditprofile');
});

//***********staff routes************************************************
Route::prefix('farmers')->middleware('auth')->group(function(){
    Route::get('/','FarmersController@index')->name('farmers')->middleware(['permission:VIEW-FARMER,require_all']);
    Route::get('/print-farmers','FarmersController@print_farmers')->middleware(['permission:VIEW-FARMER']);
    Route::get('/create','FarmersController@create')->name('create')->middleware(['permission:CREATE-FARMER']);
    Route::post('/store','FarmersController@store')->name('store')->middleware(['permission:CREATE-FARMER']);

    Route::get('/edit/{id}','FarmersController@edit')->name('edit')->middleware(['permission:EDIT-FARMER']);
    Route::post('/update/{id}','FarmersController@update')->name('update')->middleware(['permission:EDIT-FARMER']);
    Route::get('/delete/{id}','FarmersController@destroy')->name('destroy')->middleware(['permission:DELETE-FARMER']);

});

//***********Employee routes************************************************
Route::prefix('employees')->middleware('auth')->group(function(){
    Route::get('/','EmployeesController@index')->name('employees')->middleware(['permission:VIEW-EMPLOYEE,require_all']);
    Route::get('/print-employees','EmployeesController@print_employees')->middleware(['permission:VIEW-EMPLOYEE']);
    Route::get('/create','EmployeesController@create')->name('employee.create')->middleware(['permission:CREATE-EMPLOYEE']);
    Route::post('/store','EmployeesController@store')->name('employee.store')->middleware(['permission:CREATE-EMPLOYEE']);
    Route::get('/print-employees','EmployeesController@print_employees')->middleware(['permission:VIEW-EMPLOYEE']);
    Route::get('/edit/{id}','EmployeesController@edit')->name('employee.edit')->middleware(['permission:EDIT-EMPLOYEE']);
    Route::post('/update/{id}','EmployeesController@update')->name('employee.update')->middleware(['permission:EDIT-EMPLOYEE']);
    Route::get('/delete/{id}','EmployeesController@destroy')->name('employee.destroy')->middleware(['permission:DELETE-EMPLOYEE']);

});

//*************************payment module*********************************
Route::prefix('payments')->middleware('auth')->group(function(){
    Route::get('/makePayment','Accounts\PaymentController@makePayment')->name('makePayment');
    Route::post('/makePayment','Accounts\PaymentController@makePay')->name('makePay');

    Route::get('/allPayments','Accounts\PaymentController@allPayments')->name('allpayments');
    Route::get('/getPayments','Accounts\PaymentController@getPayments')->name('getpayments');
    Route::get('/printPayment', 'Accounts\PaymentController@printPayment')->name('printPayment');

});

// ************ Settings Routes ****************************//
Route::prefix('settings')->middleware('auth')->group(function(){
    Route::get('/','Settings\SettingsController@index')->middleware(['permission:MANAGE-SETTINGS']);
    Route::post('/','Settings\SettingsController@store')->middleware(['permission:MANAGE-SETTINGS']);
});
// ************ End ****************************//