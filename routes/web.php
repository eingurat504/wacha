<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

$int = '^\d+$';

Route::get('/', function () {
    return view('welcome');
})->name('home.index');

Route::get('/welcome', function () {
    return view('welcome');
});

//Route::get('/leaves', function () {
//    return view('leaves.index');
//});

Route::pattern('user', $int);

Route::group(['prefix' => '/users', 'as' => 'users.'], function () {

    Route::get('/', 'UserController@index')->name('index');
    Route::get('/{user}', 'UserController@show')->name('show');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/', 'UserController@store')->name('store');
    // Update, edit existing
    Route::get('/{user}/edit', 'UserController@edit')->name('edit');
    Route::put('/{user}', 'UserController@update')->name('update');
    // Update, edit existing
    Route::get('/{user}/profile', 'UserController@showProfile')->name('profile.index');
    Route::put('/{user}/Profile', 'UserController@updateProfile')->name('profile');
    // Delete, remove
    Route::put('/{user}/revoke', 'UserController@revoke')->name('revoke');
    Route::put('/{user}/restore', 'UserController@restore')->name('restore');
    Route::delete('/{user}', 'UserController@destroy')->name('destroy');

});

Route::pattern('leave', $int);

Route::group(['prefix' => '/leaves', 'as' => 'leaves.'], function () {

    Route::get('/', 'LeaveController@index')->name('index');
    Route::get('/{leave}', 'LeaveController@show')->name('show');
    Route::get('/create', 'LeaveController@create')->name('create');
    Route::post('/', 'LeaveController@store')->name('store');
    // Update, edit existing
    Route::get('/{leave}/edit', 'LeaveController@edit')->name('edit');
    Route::put('/{leave}', 'LeaveController@update')->name('update');
    // Delete, remove
    Route::put('/{leave}/revoke', 'LeaveController@revoke')->name('revoke');
    Route::put('/{leave}/restore', 'LeaveController@restore')->name('restore');

    Route::get('/{leave}/apply', 'LeaveController@apply')->name('apply.show');
    Route::put('/{leave}/apply', 'LeaveController@applied')->name('apply');

    Route::get('/applications', 'LeaveController@applications')->name('applications');

    Route::delete('/{leave}', 'LeaveController@destroy')->name('destroy');

});

Route::group(['prefix' => '/reports', 'as' => 'reports.'], function () {

    Route::get('/roaster', 'ReportController@roaster')->name('roaster');

});

Route::pattern('application', $int);

Route::group(['prefix' => '/applications', 'as' => 'applications.'], function () {

    Route::get('/', 'ApplicationController@index')->name('index');
    Route::get('/{application}', 'ApplicationController@show')->name('show');
    Route::get('/create', 'ApplicationController@create')->name('create');
    Route::post('/', 'ApplicationController@store')->name('store');

    // Update, edit existing
    Route::get('/{application}/edit', 'ApplicationController@edit')->name('edit');
    Route::put('/{application}', 'ApplicationController@update')->name('update');

    // Accept
    Route::get('/{application}/accept', 'ApplicationController@accept')->name('accept.show');
    Route::put('/{application}/accept', 'ApplicationController@accepted')->name('accept');

    // Approve
    Route::get('/{application}/confirm', 'ApplicationController@confirm')->name('confirm.show');
    Route::put('/{application}/confirm', 'ApplicationController@confirmed')->name('confirm');

    // Approve
    Route::get('/{application}/approve', 'ApplicationController@approve')->name('approve.show');
    Route::put('/{application}/approve', 'ApplicationController@approved')->name('approve');

    Route::get('/verified', 'ApplicationController@getApprovedApplications')->name('verified');

});

Route::group(['prefix' => '/reports', 'as' => 'reports.'], function () {

    Route::get('/roaster', 'ReportController@roaster')->name('roaster.index');
    Route::post('/roaster', 'ReportController@downloadRoaster')->name('roaster');

});

Route::pattern('permission', $int);

Route::group(['prefix' => '/permissions', 'as' => 'permissions.'], function () {

    Route::get('/', 'PermissionController@index')->name('index');
    Route::get('/{permission}', 'PermissionController@show')->name('show');
    Route::get('/create', 'PermissionController@create')->name('create');
    Route::post('/', 'PermissionController@store')->name('store');
    Route::get('/{permission}/edit', 'PermissionController@edit')->name('edit');
    Route::put('/{permission}', 'PermissionController@update')->name('update');

});

Route::pattern('role', $int);

Route::group(['prefix' => '/roles', 'as' => 'roles.'], function () {

    Route::get('/', 'RoleController@index')->name('index');
    Route::get('/{role}', 'RoleController@show')->name('show');
    Route::get('/create', 'RoleController@create')->name('create');
    Route::post('/', 'RoleController@store')->name('store');
    Route::get('/{role}/edit', 'RoleController@edit')->name('edit');
    Route::put('/{role}', 'RoleController@update')->name('update');

    // Delete, remove
    Route::delete('/{role}', 'RoleController@destroy')->name('destroy');

    Route::get('/{role}/permissions', 'RoleController@permissions')->name('permissions');
    Route::put('/{role}/permissions', 'RoleController@syncPermissions')->name('permissions.sync');

});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
