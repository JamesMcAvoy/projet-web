<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $table = 'events';

    protected $fillable = array(
        'event_title',
        'event',
        'event_price',
        'event_picture',
        'start_date',
        'time',
        'time_between_each',
        'event_number',
        'event_state'
    );

    protected $attributes = array(
        //'time_between_each' => '00:00:00',
        'event_number' => '1'
    );

    protected $primaryKey = 'event_id';

    public function picture() {
        return $this->hasMany('Models\Model\Picture', 'picture_id');
    }

    public function register() {
        return $this->hasMany('Models\Model\Registered');
    }

    public function comment() {
        return $this->hasManyThrough('Models\Model\Comment', 'Models\Model\Registered');
    }

    public $timestamps = false;

}

?>