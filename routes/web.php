<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

//使用者
Route::group(['prefix' => 'user'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('sign-up', 'UserAuthController@signUp');
        Route::post('sign-up', 'UserAuthController@postSignUp');
        Route::get('sign-in', 'UserAuthController@signIn');
        Route::post('sign-in', 'UserAuthController@postSignIn');
        Route::get('sign-out', 'UserAuthController@signOut');
    });
});

//商品

Route::group(['prefix' => 'merchandise'], function () {
    Route::get('/', 'MerchandiseController@merchandiseList');

    Route::group(['middleware' => ['user.auth.admin']], function () {
        Route::get('create', 'MerchandiseController@merchandiseCreate');
        Route::get('manage', 'MerchandiseController@merchandiseManage');
    }) ;

    Route::group(['prefix' => '{merchandise_id}'], function () {
        Route::group(['middleware' => ['user.auth.admin']], function () {
            Route::get('edit', 'MerchandiseController@merchandiseItemEdit');
            Route::put('/', 'MerchandiseController@merchandiseItemUpdate');
        });
        Route::get('/', 'MerchandiseController@merchandiseItem');
        Route::post('buy', 'MerchandiseController@merchandiseItemBuy')->middleware(['user.auth']);
    });
});

//交易
Route::get('transaction', 'TransactionController@transaction');
