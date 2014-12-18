<?php

namespace Tee\Banner\Seeds;

use Tee\Banner\Models\Banner;
use Seeder, DB, DateTime, Eloquent;

class BannerTableSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();
        #DB::table('page_categories')->delete();
        Banner::create(array(
            'name' => 'Páginas',
            'type' => Banner::PAGE,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
    
}