<?php

namespace Tee\Banner\Controllers;

use Tee\System\Controllers\BaseController;

use Tee\Banner\Models\Banner;
use View, Input;

class BannerController extends BaseController {

    /**
     * Show the banner
     *
     * @return Response
     */
    public function show($slug)
    {
        $banner = Banner::where('slug', '=', $slug)->firstOrFail();

        $bannerTitle = $banner->title;
        $bannerDescription = $banner->description;
        $bannerKeywords = $banner->keywords;

        return View::make(
            'banner::banner.show',
            compact(
                'banner', 'bannerTitle', 'bannerDescription', 'bannerKeywords'
            )
        );
    }

}
