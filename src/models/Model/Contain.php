<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model {

    protected $table = 'contains';

    protected $fillable = array(
        'item_number'
    );

    protected $attributes = array(
        'item_number' => '1'
    );

    public function item() {
        return $this->belongsTo('Models\Model\Item', 'item_id');
    }

    public function basket() {
        return $this->belongsTo('Models\Model\Basket', 'basket_id');
    }

    public $timestamps = false;

}

?>