<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Registered extends Model{

    protected $table = 'registered';

    public function user(){
        return $this->belongsTo('Models\User');
    }

    public function event(){
        return $this->belongsTo('Models\Event');
    }

    public $timestamps = false;

}

?>