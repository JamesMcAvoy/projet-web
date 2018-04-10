<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Voted extends Model{

    protected $table = 'voted';

    public function user(){
        return $this->belongsTo('Models\User');
    }

    public function idea(){
        return $this->belongsTo('Models\Idea');
    }

    public $timestamps = false;

}

?>