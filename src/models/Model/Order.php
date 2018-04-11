<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'orders';

    protected $fillable = array(
        'order_price'
    );

    public function user() {
        return $this->belongsTo('Models\Model\User');
    }

    public function hasContained() {
        return $this->hasMany('Models\Model\HasContained');
    }

    public $timestamps = false;

}

?>