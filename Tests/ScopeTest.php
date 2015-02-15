<?php

namespace Tee\Banner\Tests;

use Tee\System\Tests\TestCase;
use Tee\Banner\Models\Banner;

class ScopeTest extends TestCase {

    public function testAutoSetSiteId()
    {
        $site = currentSite();

        $banner = new Banner();
        $banner->name = 'Yes, It is a banner';
        $banner->save();

        $this->assertEquals($site->id, $banner->site_id);

        $banner = new Banner();
        $banner->name = 'Yes, Another banner';
        $banner->save();

        $this->assertEquals($site->id, $banner->site_id);
    }

    public function testCurrentSiteScope()
    {
        $site = currentSite();

        $banner = new Banner();
        $banner->name = 'Yes, It is a banner';
        $banner->save();
        $this->assertEquals($site->id, $banner->site_id);
    }

}