<?php

namespace Tee\Banner\Models;

use Tee\System\Models\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

use URL, Validator;

class BannerItem extends Model implements StaplerableInterface {
    use EloquentTrait; // Stapler Image Upload

    protected $fillable = [
        'order',
        'title',
        'description',
        'url',
        'image',
        'banner_id'
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'left' => 'x248',
            ]
        ]);

        parent::__construct($attributes);
    }

    public static function getAttributeNames() {
        return array(
            'order' => 'Ordem',
            'image' => 'Imagem',
            'title' => 'Título',
            'description' => 'Descrição'
        );
    }

    public function banner() {
        return $this->belongsTo(__NAMESPACE__.'\\Banner', 'banner_id');
    }

    public function getValidator($data, $scope)
    {
        $rules = [];

        if($scope == 'create')
            $rules['image'] = 'required';

        $v = Validator::make($data, $rules);
        return $v;
    }
}