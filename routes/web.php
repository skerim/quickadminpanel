<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Producer
    Route::delete('producers/destroy', 'ProducerController@massDestroy')->name('producers.massDestroy');
    Route::resource('producers', 'ProducerController');

    // Type
    Route::delete('types/destroy', 'TypeController@massDestroy')->name('types.massDestroy');
    Route::resource('types', 'TypeController');

    // Crane
    Route::delete('cranes/destroy', 'CraneController@massDestroy')->name('cranes.massDestroy');
    Route::resource('cranes', 'CraneController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomerController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectController');

    // Rental
    Route::delete('rentals/destroy', 'RentalController@massDestroy')->name('rentals.massDestroy');
    Route::resource('rentals', 'RentalController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Maintenance
    Route::delete('maintenances/destroy', 'MaintenanceController@massDestroy')->name('maintenances.massDestroy');
    Route::resource('maintenances', 'MaintenanceController');

    // Raport
    Route::delete('raports/destroy', 'RaportController@massDestroy')->name('raports.massDestroy');
    Route::resource('raports', 'RaportController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Harmonogram
    Route::delete('harmonograms/destroy', 'HarmonogramController@massDestroy')->name('harmonograms.massDestroy');
    Route::resource('harmonograms', 'HarmonogramController');

    // Craneclass
    Route::delete('craneclasses/destroy', 'CraneclassController@massDestroy')->name('craneclasses.massDestroy');
    Route::resource('craneclasses', 'CraneclassController');

    // Support
    Route::delete('supports/destroy', 'SupportController@massDestroy')->name('supports.massDestroy');
    Route::resource('supports', 'SupportController');

    // Klimatyzacja
    Route::delete('klimatyzacjas/destroy', 'KlimatyzacjaController@massDestroy')->name('klimatyzacjas.massDestroy');
    Route::resource('klimatyzacjas', 'KlimatyzacjaController');

    // Liny
    Route::delete('linies/destroy', 'LinyController@massDestroy')->name('linies.massDestroy');
    Route::post('linies/media', 'LinyController@storeMedia')->name('linies.storeMedia');
    Route::post('linies/ckmedia', 'LinyController@storeCKEditorImages')->name('linies.storeCKEditorImages');
    Route::resource('linies', 'LinyController');

    // Zawiesia
    Route::delete('zawiesia/destroy', 'ZawiesiaController@massDestroy')->name('zawiesia.massDestroy');
    Route::post('zawiesia/media', 'ZawiesiaController@storeMedia')->name('zawiesia.storeMedia');
    Route::post('zawiesia/ckmedia', 'ZawiesiaController@storeCKEditorImages')->name('zawiesia.storeCKEditorImages');
    Route::resource('zawiesia', 'ZawiesiaController');

    // Transport
    Route::delete('transports/destroy', 'TransportController@massDestroy')->name('transports.massDestroy');
    Route::resource('transports', 'TransportController');

    // Servis
    Route::delete('servis/destroy', 'ServisController@massDestroy')->name('servis.massDestroy');
    Route::resource('servis', 'ServisController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
