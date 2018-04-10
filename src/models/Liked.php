<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Liked extends Model{

    protected $table = 'liked';

    public function user(){
        return $this->belongsTo('Models\User');
    }

    public function picture(){
        return $this->belongsTo('Models\Picture');
    }

    public $timestamps = false;

}

?>