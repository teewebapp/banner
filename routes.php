<?php

namespace Tee\Banner;
use Route, Config;

Route::group(['prefix' => 'admin'], function() {
    Route::post('banner_item/order', [
        'as' => 'admin.banner_item.order',
        'uses' => __NAMESPACE__.'\Controllers\Admin\ItemController@order'
    ]);
    Route::resource('banner_item', __NAMESPACE__.'\Controllers\Admin\ItemController',
        ['except' => array('show')]
    );
});