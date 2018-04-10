<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{

    protected $table = 'comments';

    protected $fillable = array(
        'comment',
        'date_comment',
        'state_comment'
    );

    protected $attributes = array(
        'state_comment' => 'valid'
    );

    public function user(){
        return $this->belongsTo('Models\User');
    }

    public function picture(){
        return $this->belongsTo('Models\Picture');
    }

    public $timestamps = false;

}

?>