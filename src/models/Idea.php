<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model{

    protected $table = 'ideas';

    protected $fillable = array(
        'title_idea',
        'idea',
        'number_vote_idea',
        'state_idea'

    );

    protected $attributes = array(
        'number_vote_idea' => '0',
        'state_idea' => 'waiting'
    );

    public function user(){
        return $this->belongsTo('Models\User');
    }

    public function voted(){
        return $this->hasMany('Models\Voted');
    }

    public $timestamps = false;

}

?>