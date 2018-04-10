<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    protected $table = 'orders';

    protected $fillable = array(
        'date_order',
        'price_order'
    );

    public function user(){
        return $this->belongsTo('Models\User');
    }

    public function hasContained(){
        return $this->hasMany('Models\HasContained');
    }

    public $timestamps = false;

}

?>