<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

    protected $table = 'notifications';

    protected $fillable = array(
        'notif_title',
        'notif'
    );

    protected $primaryKey = 'notif_id';

    public function user() {
        return $this->belongsTo('Models\Model\User', 'user_id');
    }

    public $timestamps = false;

}

?>