<?php

namespace Tee\Banner\Controllers\Admin;

use Tee\Admin\Controllers\AdminBaseController;

use Tee\Banner\Models\Banner;
use Tee\Banner\Models\BannerItem;
use View, Redirect, Validator, URL, Input;

use Tee\System\Breadcrumbs;

use Tee\Admin\Controllers\ResourceController;

class ItemController extends ResourceController {
    public $resourceTitle = null;
    public $resourceName = 'banner_item';
    public $modelClass = 'Tee\\Banner\\Models\\BannerItem';
    public $moduleName = 'banner';
    public $orderable = true;
    public $orderBy = 'order';
    public $orderType = 'ASC';

    public function __construct() {
        $this->resourceTitle = $this->getBanner()->name;
        parent::__construct();
    }

    public function index() {
        View::share('orderable', $this->orderable);
        return parent::index();
    }

    public function getBanner() {
        return Banner::first();
    }

    public function beforeSave($model) {
        $model->banner_id = $this->getBanner()->id;
    }

    public function beforeList($queryBuilder) {
        $banner = $this->getBanner();
        return $queryBuilder
            ->where('banner_id', $banner->id)
            ->orderBy($this->orderBy, $this->orderType);
    }

    /**
     * Edit order
     *
     * @param  int  $id
     * @return Response
     */
    public function order()
    {
        $item1 = BannerItem::find((int)Input::get('id1'));
        $item2 = BannerItem::find((int)Input::get('id2'));

        $itens = $item1->banner->itens;
        $i = 0;
        foreach($itens as $item) {
            $item->order = $i;
            $item->save();
            $i += 1;
        }

        $order1 = Input::get('order1');
        $order2 = Input::get('order2');

        $item1->order = (int)$order1;
        $item2->order = (int)$order2;

        $item1->save();
        $item2->save();

        return json_encode(['success' => true]);
    }

}
