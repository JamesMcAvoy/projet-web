<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class HasContained extends Model {

    protected $table = 'has_contained';

    protected $fillable = array(
        'item_number'
    );

    public function item() {
        return $this->belongsTo('Models\Model\Item');
    }

    public function order() {
        return $this->belongsTo('Models\Model\Order');
    }

    public $timestamps = false;

}

?>