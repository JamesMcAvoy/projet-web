<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model {

    protected $table = 'basket';

    protected $fillable = array(
        'basket_price'
    );

    protected $attributes = array(
        'basket_price' => '0'
    );

    public function user() {
        return $this->belongsTo('Models\Model\User', 'user_id');
    }

    public function contain() {
        return $this->hasMany('Models\Model\Contain');
    }

    public $timestamps = false;

}

?>