<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Links
    Route::apiResource('links', 'LinksApiController');

    // Pages
    Route::post('pages/media', 'PagesApiController@storeMedia')->name('pages.storeMedia');
    Route::apiResource('pages', 'PagesApiController');

    // News
    Route::post('news/media', 'NewsApiController@storeMedia')->name('news.storeMedia');
    Route::apiResource('news', 'NewsApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Files
    Route::post('files/media', 'FilesApiController@storeMedia')->name('files.storeMedia');
    Route::apiResource('files', 'FilesApiController');

    // Colors
    Route::apiResource('colors', 'ColorsApiController');
});
