<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('brackets/admin-auth::admin.auth.login');
});


Route::get('/importar', 'App\Http\Controllers\Admin\ClienteController@importar')->name('importar');
Route::post('/insertar', 'App\Http\Controllers\Admin\ClienteController@insertar')->name('insertar');
Route::post('/guardar-datos', 'App\Http\Controllers\Admin\ClienteController@guardar')->name('guardar');
//Route::match(['get', 'post'], '/guardar-datos', 'App\Http\Controllers\Admin\ClienteController@guardar')->name('guardar');



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('custumers')->name('custumers/')->group(static function() {
            Route::get('/',                                             'CustumersController@index')->name('index');
            Route::get('/create',                                       'CustumersController@create')->name('create');
            Route::post('/',                                            'CustumersController@store')->name('store');
            Route::get('/{custumer}/edit',                              'CustumersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CustumersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{custumer}',                                  'CustumersController@update')->name('update');
            Route::delete('/{custumer}',                                'CustumersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('documents')->name('documents/')->group(static function() {
            Route::get('/',                                             'DocumentsController@index')->name('index');
            Route::get('/create',                                       'DocumentsController@create')->name('create');
            Route::post('/',                                            'DocumentsController@store')->name('store');
            Route::get('/{document}/edit',                              'DocumentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DocumentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{document}',                                  'DocumentsController@update')->name('update');
            Route::delete('/{document}',                                'DocumentsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('impressions')->name('impressions/')->group(static function() {
            Route::get('/',                                             'ImpressionsController@index')->name('index');
            Route::get('/create',                                       'ImpressionsController@create')->name('create');
            Route::post('/',                                            'ImpressionsController@store')->name('store');
            Route::get('/{impression}/edit',                            'ImpressionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ImpressionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{impression}',                                'ImpressionsController@update')->name('update');
            Route::delete('/{impression}',                              'ImpressionsController@destroy')->name('destroy');
            Route::get('/imprimir',                                    'ImpressionsController@pdf')->name('imprimir');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('customers')->name('customers/')->group(static function() {
            Route::get('/',                                             'CustomersController@index')->name('index');
            Route::get('/create',                                       'CustomersController@create')->name('create');
            Route::post('/',                                            'CustomersController@store')->name('store');
            Route::get('/{customer}/edit',                              'CustomersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CustomersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{customer}',                                  'CustomersController@update')->name('update');
            Route::delete('/{customer}',                                'CustomersController@destroy')->name('destroy');
        });
    });
});
