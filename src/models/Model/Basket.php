<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model {

    protected $table = 'basket';

    protected $fillable = array(
        'price_basket'
    );

    protected $attributes = array(
        'price_basket' => '0'
    );

    public function user() {
        return $this->belongsTo('Models\Model\User');
    }

    public function contain() {
        return $this->hasMany('Models\Model\Contain');
    }

    public $timestamps = false;

}

?>