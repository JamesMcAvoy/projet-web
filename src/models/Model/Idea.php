<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model {

    protected $table = 'ideas';

    protected $fillable = array(
        'idea_title',
        'idea'
    );

    protected $primaryKey = 'idea_id';

    public function user() {
        return $this->belongsTo('Models\Model\User', 'user_id');
    }

    public function voted() {
        return $this->hasMany('Models\Model\Voted');
    }

    public $timestamps = false;

}

?>