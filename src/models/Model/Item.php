<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $table = 'goodies';

    protected $fillable = array(
        'name_item',
        'description_item',
        'picture_item',
        'price_item',
        'number_item',
        'nbr_orders'
    );

    protected $attributes = array(
        'number_item' => '0',
        'nbr_orders' => '0'
    );

    public function category() {
        return $this->belongsTo('Models\Model\Category');
    }

    public function contain() {
        return $this->hasMany('Models\Model\Contain');
    }

    public function hasContained() {
        return $this->hasMany('Models\Model\HasContained');
    }

    public $timestamps = false;

}

?>