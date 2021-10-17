<?php

Auth::routes(['register' => false]);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    
    // Crea site.xml per motori di ricerca
    Route::get('sitemap', 'HomeController@sitemap')->name('sitemap');

    // Visualizza valori in sessione
    Route::get('/session', function () {
        dd(session()->all());
    });

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

    // Links
    Route::delete('links/destroy', 'LinksController@massDestroy')->name('links.massDestroy');
    Route::resource('links', 'LinksController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // News
    Route::delete('news/destroy', 'NewsController@massDestroy')->name('news.massDestroy');
    Route::post('news/media', 'NewsController@storeMedia')->name('news.storeMedia');
    Route::post('news/ckmedia', 'NewsController@storeCKEditorImages')->name('news.storeCKEditorImages');
    Route::resource('news', 'NewsController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Files
    Route::delete('files/destroy', 'FilesController@massDestroy')->name('files.massDestroy');
    Route::post('files/media', 'FilesController@storeMedia')->name('files.storeMedia');
    Route::post('files/ckmedia', 'FilesController@storeCKEditorImages')->name('files.storeCKEditorImages');
    Route::resource('files', 'FilesController');

    // Colors
    Route::delete('colors/destroy', 'ColorsController@massDestroy')->name('colors.massDestroy');
    Route::resource('colors', 'ColorsController');

    Route::post('savesetting/{setting}', 'HomeController@saveSetting')->name('save-setting');

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


// Route::group(['middleware' => ['auth']], function () {
    Route::get('/welcome', function () {
        return view('welcome');
    });
    Route::get('/welcome2', function () {
        return view('welcome2');
    });

    Route::get('/download/{slug}', 'SiteController@download')->name('file-download');
    Route::get('/notizia/{slug}', 'SiteController@news')->name('site-one-news');
    Route::get('/news/{slug}', 'SiteController@index')->name('site-news');
    Route::get('/{slug?}', 'SiteController@index')->name('site');
// });