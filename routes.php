<?php

namespace Tee\Banner;
use Route, Config;

Route::group(['prefix' => Config::get('i18n.locale_preffix')], function() {
    Route::any('/banners/{slug}', [
        'as' => 'banner.show',
        'uses' => __NAMESPACE__.'\Controllers\BannerController@show'
    ]);
});

Route::group(['prefix' => 'admin'], function() {
    Route::post('banner/order', [
        'as' => 'admin.banner.order',
        'uses' => __NAMESPACE__.'\Controllers\AdminController@order'
    ]);
    Route::resource('banner', __NAMESPACE__.'\Controllers\AdminController',
        ['except' => array('show')]
    );
});