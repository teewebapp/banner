<?php

namespace Tee\Banner\Seeds;

use Tee\Banner\Models\Banner;
use Seeder, DB, Eloquent;

class BannerTableSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();
        
        $banner = new Banner();
        $banner->id = 1;
        $banner->name = 'Banner Principal';
        $banner->site_id = currentSite()->id;
        $banner->save();
    }

}