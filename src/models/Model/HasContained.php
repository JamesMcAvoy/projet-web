<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class HasContained extends Model {

    protected $table = 'has_contained';

    protected $fillable = array(
        'item_number'
    );

    public function item() {
        return $this->belongsTo('Models\Model\Item', 'item_id');
    }

    public function order() {
        return $this->belongsTo('Models\Model\Order', 'order_id');
    }

    public $timestamps = false;

}

?>