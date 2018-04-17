<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $table = 'goodies';

    protected $fillable = array(
        'item_name',
        'item_desc',
        'item_picture',
        'item_price',
        'item_number',
        'orders_nbr'
    );

    protected $attributes = array(
        'item_number' => '0',
        'orders_nbr' => '0'
    );

    protected $primaryKey = 'item_id';

    public function category() {
        return $this->belongsTo('Models\Model\Category', 'category_id');
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