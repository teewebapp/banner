<?php

namespace Tee\Banner;

use Tee\Banner\Widgets\BannerBoxList;
use Tee\System\Widget;
use Event;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        Widget::register(
            'mainBanner',
            __NAMESPACE__.'\\Widgets\\MainBanner'
        );

        Event::listen('admin::menu.load', function($menu) {
            $format = '<img src="%s" class="fa" />&nbsp;&nbsp;<span>%s</span>';
            $menu->add(
                sprintf($format, moduleAsset('banner', 'images/icon_banner.png'), 'Banner'),
                route('admin.banner_item.index')
            );
        });
    }
}
