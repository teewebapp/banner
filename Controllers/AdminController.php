<?php

namespace Tee\Banner\Controllers;

use Tee\Admin\Controllers\AdminBaseController;

use Tee\Banner\Models\Banner;
use Tee\Banner\Models\BannerCategory;
use View, Redirect, Validator, URL, Input;

use Tee\System\Breadcrumbs;

use Tee\Admin\Controllers\ResourceController;

class AdminController extends ResourceController {
    public $resourceTitle = 'Página';
    public $resourceName = 'banner';
    public $modelClass = 'Tee\\Banner\\Models\\Banner';
    public $moduleName = 'banner';
    public $orderable = true;
    public $orderBy = 'order';
    public $orderType = 'ASC';

    public function index() {
        View::share('orderable', $this->orderable);
        return parent::index();
    }

    public function getCategory() {
        return BannerCategory::where('type', '=', BannerCategory::PAGE)->first();
    }

    public function beforeSave($model) {
        $model->banner_category_id = $this->getCategory()->id;
    }

    public function beforeList($queryBuilder) {
        $category = $this->getCategory();
        return $queryBuilder
            ->where('banner_category_id', $category->id)
            ->orderBy($this->orderBy, $this->orderType);
    }

    /**
     * Show the form for editing the specified banner.
     *
     * @param  int  $id
     * @return Response
     */
    public function order()
    {
        $banner1 = Banner::find((int)Input::get('id1'));
        $banner2 = Banner::find((int)Input::get('id2'));

        $banners = $banner1->category->banners;
        $i = 0;
        foreach($banners as $banner) {
            $banner->order = $i;
            $banner->save();
            $i += 1;
        }

        $order1 = Input::get('order1');
        $order2 = Input::get('order2');

        $banner1->order = (int)$order1;
        $banner2->order = (int)$order2;

        $banner1->save();
        $banner2->save();

        return json_encode(['success' => true]);
    }

}
