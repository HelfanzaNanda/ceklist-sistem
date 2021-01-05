<?php

use Illuminate\Support\Facades\Route;


Route::get('login', 'Auth\LoginController@showFormLogin')->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::get('dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');

    Route::prefix('task')->group(function() {
        Route::get('/{state}', 'Admin\TaskController@index')->name('admin.task.index');
        Route::get('/{state}/create', 'Admin\TaskController@create')->name('admin.task.create');
        Route::post('/create', 'Admin\TaskController@store')->name('admin.task.post');
        Route::get('/{task:id}/edit', 'Admin\TaskController@edit')->name('admin.task.edit');
        Route::put('/{task:id}/edit', 'Admin\TaskController@update');
        Route::delete('/{task:id}/delete', 'Admin\TaskController@destroy')->name('admin.task.delete');
    });

    Route::prefix('verif')->group(function(){
        Route::get('/{state}', 'Admin\VerifController@index')->name('admin.verif.index');
        Route::get('/{state}/{verif:id}/pdf', 'Admin\VerifController@pdf')->name('admin.verif.pdf');
    });

    Route::prefix('message')->group(function() {
        Route::get('/', 'Admin\MessageController@index')->name('admin.message.index');
        Route::post('/update', 'Admin\MessageController@update')->name('admin.message.update');
    });

    Route::prefix('schedulle')->group(function() {
        Route::get('/', 'Admin\SchedulleController@index')->name('admin.schedulle.index');

        Route::get('/create', 'Admin\SchedulleController@create')->name('admin.schedulle.create');

        Route::post('/create', 'Admin\SchedulleController@store');

        Route::get('/{schedulle:id}/edit', 'Admin\SchedulleController@edit')->name('admin.schedulle.edit');

        Route::put('/{schedulle:id}/edit', 'Admin\SchedulleController@update');

        Route::delete('/{schedulle:id}/delete', 'Admin\SchedulleController@destroy')->name('admin.schedulle.delete');
    });

    Route::prefix('office-boy')->group(function() {
        Route::get('/', 'Admin\OBController@index')->name('admin.ob.index');

        Route::get('/create', 'Admin\OBController@create')->name('admin.ob.create');

        Route::post('/create', 'Admin\OBController@store');

        Route::get('/{user:id}/edit', 'Admin\OBController@edit')->name('admin.ob.edit');

        Route::put('/{user:id}/edit', 'Admin\OBController@update');

        Route::delete('/{user:id}/delete', 'Admin\OBController@destroy')->name('admin.ob.destroy');
    });
});

Route::prefix('office-boy')->group(function(){

    Route::get('dashboard', 'OB\DashboardController@dashboard')->name('ob.dashboard');

    Route::prefix('task')->group(function(){
        Route::get('{state}', 'OB\TaskOneController@index')->name('ob.taks.index');

        Route::get('{state}/data', 'OB\TaskOneController@getData');

        Route::post('clear', 'OB\TaskOneController@clear')->name('task.clear');
    });

    Route::get('schedulle', 'OB\schedulleController@index')->name('ob.schedulle.index');

    Route::prefix('message')->group( function() {
        Route::get('/', 'OB\MessageController@index')->name('ob.mesage.index');

        Route::put('update', 'OB\MessageController@update')->name('ob.mesage.update');
    });

});


Route::get('/home', 'HomeController@index')->name('home');
