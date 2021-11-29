<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

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

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Reviews
    Route::delete('reviews/destroy', 'ReviewsController@massDestroy')->name('reviews.massDestroy');
    Route::post('reviews/media', 'ReviewsController@storeMedia')->name('reviews.storeMedia');
    Route::post('reviews/ckmedia', 'ReviewsController@storeCKEditorImages')->name('reviews.storeCKEditorImages');
    Route::resource('reviews', 'ReviewsController');

    // Infrastructure
    Route::delete('infrastructures/destroy', 'InfrastructureController@massDestroy')->name('infrastructures.massDestroy');
    Route::resource('infrastructures', 'InfrastructureController');

    // Metro
    Route::delete('metros/destroy', 'MetroController@massDestroy')->name('metros.massDestroy');
    Route::resource('metros', 'MetroController');

    // Complex
    Route::delete('complexes/destroy', 'ComplexController@massDestroy')->name('complexes.massDestroy');
    Route::post('complexes/media', 'ComplexController@storeMedia')->name('complexes.storeMedia');
    Route::post('complexes/ckmedia', 'ComplexController@storeCKEditorImages')->name('complexes.storeCKEditorImages');
    Route::resource('complexes', 'ComplexController');

    // Type
    Route::delete('types/destroy', 'TypeController@massDestroy')->name('types.massDestroy');
    Route::resource('types', 'TypeController');

    // Finishing
    Route::delete('finishings/destroy', 'FinishingController@massDestroy')->name('finishings.massDestroy');
    Route::resource('finishings', 'FinishingController');

    // Status
    Route::delete('statuses/destroy', 'StatusController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusController');

    // Apartment
    Route::delete('apartments/destroy', 'ApartmentController@massDestroy')->name('apartments.massDestroy');
    Route::post('apartments/media', 'ApartmentController@storeMedia')->name('apartments.storeMedia');
    Route::post('apartments/ckmedia', 'ApartmentController@storeCKEditorImages')->name('apartments.storeCKEditorImages');
    Route::resource('apartments', 'ApartmentController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');
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
