<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Producer
    Route::apiResource('producers', 'ProducerApiController');

    // Type
    Route::apiResource('types', 'TypeApiController');

    // Crane
    Route::apiResource('cranes', 'CraneApiController');

    // Customer
    Route::apiResource('customers', 'CustomerApiController');

    // Project
    Route::post('projects/media', 'ProjectApiController@storeMedia')->name('projects.storeMedia');
    Route::apiResource('projects', 'ProjectApiController');

    // Rental
    Route::apiResource('rentals', 'RentalApiController');

    // Report
    Route::apiResource('reports', 'ReportApiController');

    // Maintenance
    Route::apiResource('maintenances', 'MaintenanceApiController');
});
