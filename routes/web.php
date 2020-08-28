<?php



Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'DashboardController')->name('dashboard.index');
    Route::get('/home', 'DashboardController')->name('dashboard.index');
    Route::resource('users', 'UserController');
    Route::put('profile', 'UserController@profile')->name('users.profile');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('markets', 'MarketController');
    Route::resource('warehouses', 'WarehouseController');
    Route::resource('drivers', 'DriverController');
    Route::resource('orders', 'OrderController');
    Route::resource('warehouseusers', 'WarehouseUsersController');
    Route::resource('warehouseorders', 'WarehouseOrderController');
    Route::resource('driverorders', 'DriverOrderController');
    Route::resource('bills', 'BillController');
    Route::post('order/status', 'WarehouseOrderController@status')->name('order.status');


    Route::get('warehouse/orders/{id}', 'WarehouseController@orders')->name('warehouses.orders');
    Route::get('market/orders', 'MarketController@orders')->name('market.orders');
    Route::get('return/orders/{driverOrderId}', 'DriverOrderController@returnOrder')->name('return.orders');
    Route::post('market/orders', 'OrderController@marketOrdersStore')->name('market.orderstore');


    // API 
    Route::get('get/orders', 'OrderController@orders')->name('get.orders');

});

Auth::routes();
