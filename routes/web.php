<?php

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
    Route::get('create', 'MerchandiseController@merchandiseCreate');
    Route::get('manage', 'MerchandiseController@merchandiseManage');

    Route::group(['prefix' => '{merchandise_id}'], function () {
        Route::get('/', 'MerchandiseController@merchandiseItem');
        Route::get('edit', 'MerchandiseController@merchandiseItemEdit');
        Route::put('/', 'MerchandiseController@merchandiseItemUpdate');
        Route::post('buy', 'MerchandiseController@merchandiseItemBuy');
    });
});

//交易
Route::get('transaction', 'TransactionController@transaction');
