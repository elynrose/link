<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
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

    // Domains
    Route::delete('domains/destroy', 'DomainsController@massDestroy')->name('domains.massDestroy');
    Route::resource('domains', 'DomainsController');

    // Qr Codes
    Route::delete('qr-codes/destroy', 'QrCodesController@massDestroy')->name('qr-codes.massDestroy');
    Route::resource('qr-codes', 'QrCodesController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Clicks
    Route::delete('clicks/destroy', 'ClicksController@massDestroy')->name('clicks.massDestroy');
    Route::resource('clicks', 'ClicksController');

    // Social
    Route::delete('socials/destroy', 'SocialController@massDestroy')->name('socials.massDestroy');
    Route::post('socials/media', 'SocialController@storeMedia')->name('socials.storeMedia');
    Route::post('socials/ckmedia', 'SocialController@storeCKEditorImages')->name('socials.storeCKEditorImages');
    Route::resource('socials', 'SocialController');

    // Templates
    Route::delete('templates/destroy', 'TemplatesController@massDestroy')->name('templates.massDestroy');
    Route::post('templates/media', 'TemplatesController@storeMedia')->name('templates.storeMedia');
    Route::post('templates/ckmedia', 'TemplatesController@storeCKEditorImages')->name('templates.storeCKEditorImages');
    Route::resource('templates', 'TemplatesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

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

    // Domains
    Route::delete('domains/destroy', 'DomainsController@massDestroy')->name('domains.massDestroy');
    Route::resource('domains', 'DomainsController');

    // Qr Codes
    Route::delete('qr-codes/destroy', 'QrCodesController@massDestroy')->name('qr-codes.massDestroy');
    Route::resource('qr-codes', 'QrCodesController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Clicks
    Route::delete('clicks/destroy', 'ClicksController@massDestroy')->name('clicks.massDestroy');
    Route::resource('clicks', 'ClicksController');

    // Social
    Route::delete('socials/destroy', 'SocialController@massDestroy')->name('socials.massDestroy');
    Route::post('socials/media', 'SocialController@storeMedia')->name('socials.storeMedia');
    Route::post('socials/ckmedia', 'SocialController@storeCKEditorImages')->name('socials.storeCKEditorImages');
    Route::resource('socials', 'SocialController');

    // Templates
    Route::delete('templates/destroy', 'TemplatesController@massDestroy')->name('templates.massDestroy');
    Route::post('templates/media', 'TemplatesController@storeMedia')->name('templates.storeMedia');
    Route::post('templates/ckmedia', 'TemplatesController@storeCKEditorImages')->name('templates.storeCKEditorImages');
    Route::resource('templates', 'TemplatesController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
