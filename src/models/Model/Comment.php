<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    protected $fillable = array(
        'comment'
    );

    protected $primaryKey = 'comment_id';

    public function user() {
        return $this->belongsTo('Models\Model\User', 'user_id');
    }

    public function picture() {
        return $this->belongsTo('Models\Model\Picture', 'picture_id');
    }

    public $timestamps = false;

}

?>