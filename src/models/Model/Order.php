<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'orders';

    protected $fillable = array(
        'date_order',
        'price_order'
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