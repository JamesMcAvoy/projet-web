<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model{

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

    public function event(){
        return $this->belongsTo('Models\Event');
    }

    public function user(){
        return $this->belongsTo('Models\User');
    }

    public function comment(){
        return $this->hasMany('Models\Comment');
    }

    public function liked(){
        return $this->hasMany('Models\Liked');
    }

    public $timestamps = false;

}

?>