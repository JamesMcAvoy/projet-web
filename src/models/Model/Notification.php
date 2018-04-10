<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

    protected $table = 'notifications';

    protected $fillable = array(
        'date_notif',
        'title_notif',
        'notif',
        'is_read'
    );

    protected $attributes = array(
        'is_read' => '0',
    );

    public function user() {
        return $this->belongsTo('Models\Model\User');
    }

    public $timestamps = false;

}

?>