<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    protected $table = 'pictures';

    protected $fillable = array(
        'picture_title',
        'picture',
        'picture_desc'
    );

    public function event() {
        return $this->belongsTo('Models\Model\Event', 'event_id');
    }

    public function user() {
        return $this->belongsTo('Models\Model\User', 'user_id');
    }

    public function comment() {
        return $this->hasMany('Models\Model\Comment');
    }

    public function liked() {
        return $this->hasMany('Models\Model\Liked');
    }

    public $timestamps = false;

}

?>