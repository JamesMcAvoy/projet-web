<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Liked extends Model {

    protected $table = 'liked';

    public function user() {
        return $this->belongsTo('Models\Model\User', 'user_id');
    }

    public function picture() {
        return $this->belongsTo('Models\Model\Picture', 'picture_id');
    }

    public $timestamps = false;

}

?>