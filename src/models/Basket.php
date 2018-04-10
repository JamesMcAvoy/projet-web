<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model{

    protected $table = 'basket';

    protected $fillable = array(
        'price_basket'
    );

    protected $attributes = array(
        'price_basket' => '0'
    );

    public function user(){
        return $this->belongsTo('Models\User');
    }

    public function contain(){
        return $this->hasMany('Models\Contain');
    }

    public $timestamps = false;

}

?>