<?php

namespace ModelsModel\;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    protected $table = 'pictures';

    protected $fillable = array(
        'title_picture',
        'date_picture',
        'picture',
        'description_picture',
        'number_like_picture',
        'state_picture'
    );

    protected $attributes = array(
        'number_like_picture' => '0',
        'state_picture' => 'valid'
    );

    public function event() {
        return $this->belongsTo('Models\Model\Event');
    }

    public function user() {
        return $this->belongsTo('Models\Model\User');
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