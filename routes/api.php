<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Settings
    Route::post('settings/media', 'SettingsApiController@storeMedia')->name('settings.storeMedia');
    Route::apiResource('settings', 'SettingsApiController');

    // Reviews
    Route::post('reviews/media', 'ReviewsApiController@storeMedia')->name('reviews.storeMedia');
    Route::apiResource('reviews', 'ReviewsApiController');

    // Infrastructure
    Route::apiResource('infrastructures', 'InfrastructureApiController');

    // Complex
    Route::post('complexes/media', 'ComplexApiController@storeMedia')->name('complexes.storeMedia');
    Route::apiResource('complexes', 'ComplexApiController');

    // Type
    Route::apiResource('types', 'TypeApiController');

    // Status
    Route::apiResource('statuses', 'StatusApiController');

    // Apartment
    Route::post('apartments/media', 'ApartmentApiController@storeMedia')->name('apartments.storeMedia');
    Route::apiResource('apartments', 'ApartmentApiController');

    // Order
    Route::apiResource('orders', 'OrderApiController');
});
