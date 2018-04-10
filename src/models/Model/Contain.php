<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model {

    protected $table = 'contains';

    protected $fillable = array(
        'number_item'
    );

    protected $attributes = array(
        'number_item' => '1'
    );

    public function item() {
        return $this->belongsTo('Models\Model\Item');
    }

    public function basket() {
        return $this->belongsTo('Models\Model\Basket');
    }

    public $timestamps = false;

}

?>