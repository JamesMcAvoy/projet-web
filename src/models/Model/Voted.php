<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Voted extends Model {

    protected $table = 'voted';

    public function user() {
        return $this->belongsTo('Models\Model\User');
    }

    public function idea() {
        return $this->belongsTo('Models\Model\Idea');
    }

    public $timestamps = false;

}

?>