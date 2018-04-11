<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model {

    protected $table = 'ideas';

    protected $fillable = array(
        'idea_title',
        'idea'
    );

    public function user() {
        return $this->belongsTo('Models\Model\User');
    }

    public function voted() {
        return $this->hasMany('Models\Model\Voted');
    }

    public $timestamps = false;

}

?>