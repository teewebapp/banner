<?php

namespace Tee\Banner\Seeds;

use Tee\Banner\Models\Banner;
use Seeder, DB, Eloquent;

class BannerTableSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();

        Banner::create(array(
            'id' => 1,
            'name' => 'Banner Principal',
        ));
    }

}