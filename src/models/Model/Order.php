<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'orders';

    protected $fillable = array(
        'order_price'
    );

    protected $primaryKey = 'order_id';

    public function user() {
        return $this->belongsTo('Models\Model\User', 'user_id');
    }

    public function hasContained() {
        return $this->hasMany('Models\Model\HasContained');
    }

    public $timestamps = false;

}

?>