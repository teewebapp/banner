<?php

namespace Tee\Banner\Widgets;

use View, Config;
use Tee\Banner\Models\Banner;


class MainBanner {

    public function register()
    {
        $banner = Banner::first();
        $listBackground = array('banner_bg1.png', 'banner_bg2.png', 'banner_bg3.png', 'banner_bg4.png');
        $getBackgroundByPos = function($pos) use($listBackground) {
            return moduleAsset('banner', 'images/'.$listBackground[$pos % count($listBackground)]);
        };
        return View::make(
            'banner::widgets.mainBanner.mainBanner',
            compact('banner', 'getBackgroundByPos')
        );
    }

} 
