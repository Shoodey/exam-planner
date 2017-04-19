<?php

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
    return view('landing');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'admin'], function () {
        Route::get('users', 'UsersController@admin_index')->name('admin.users.index');
        Route::get('courses', 'CoursesController@admin_index')->name('admin.courses.index');
        Route::get('sections', 'SectionsController@admin_index')->name('admin.sections.index');
    });

    Route::group(['prefix' => 'faculty'], function () {
        Route::get('courses', 'CoursesController@faculty_index')->name('faculty.courses.index');
        Route::get('requests', 'RequestsController@faculty_index')->name('faculty.requests.index');
        Route::get('requests/create', 'RequestsController@faculty_create')->name('faculty.requests.create');
    });

    Route::group(['prefix' => 'registrar'], function () {
        Route::get('requests', 'RequestsController@registrar_index')->name('registrar.requests.index');

        Route::get('tentatives', function() {
            $menu = 'registrar.tentatives';
            return view('registrar.tentatives', compact('menu'));
        })->name('registrar.tentatives');

        Route::get('settings', function() {
            $menu = 'registrar.settings';
            return view('registrar.settings', compact('menu'));
        })->name('registrar.settings');

        Route::get('calendar', function() {
            $menu = 'registrar.calendar';
            return view('registrar.calendar', compact('menu'));
        })->name('registrar.calendar');
    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();

