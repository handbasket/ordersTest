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

Route::prefix('system-administrator')
    ->middleware('auth')
    ->group(function (){
    Route::get('order/add', 'Admin\AddOrderController@page')->name('order.add.form');
    Route::match(['POST', 'PUT'],'order/add', 'Admin\AddOrderController@add')->name('order.add');

    Route::get('order/{id}/change/status', 'Admin\ChangeStatusOrderController@page')
        ->name('order.change.status.form')
        ->where(['id' => '[0-9]+']);
    Route::match(['POST', 'PUT'],'order/{id}/change/status', 'Admin\ChangeStatusOrderController@change')
        ->name('order.change.status')
        ->where(['id' => '[0-9]+']);

    Route::get('user/{user_id}/orders', 'Admin\OrdersController@userOrders')
        ->name('user.orders')
        ->where(['user_id' => '[0-9]+']);

    Route::get('users', 'Admin\UsersController@page')->name('users');

    Route::get('', 'Admin\AdminPanelController@page')->name('admin.panel');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
