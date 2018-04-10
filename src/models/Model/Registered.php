<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Registered extends Model {

    protected $table = 'registered';

    public function user() {
        return $this->belongsTo('Models\Model\User');
    }

    public function event() {
        return $this->belongsTo('Models\Model\Event');
    }

    public $timestamps = false;

}

?>