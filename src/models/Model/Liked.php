<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Liked extends Model {

    protected $table = 'liked';

    public function user() {
        return $this->belongsTo('Models\Model\User');
    }

    public function picture() {
        return $this->belongsTo('Models\Model\Picture');
    }

    public $timestamps = false;

}

?>