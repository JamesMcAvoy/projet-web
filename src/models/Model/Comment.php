<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    protected $fillable = array(
        'comment'
    );

    public function user() {
        return $this->belongsTo('Models\Model\User');
    }

    public function picture() {
        return $this->belongsTo('Models\Model\Picture');
    }

    public $timestamps = false;

}

?>