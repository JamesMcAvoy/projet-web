<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model{

    protected $table = 'contains';

    protected $fillable = array(
        'number_item'
    );

    protected $attributes = array(
        'number_item' => '1'
    );

    public function item(){
        return $this->belongsTo('Models\Item');
    }

    public function basket(){
        return $this->belongsTo('Models\Basket');
    }

    public $timestamps = false;

}

?>