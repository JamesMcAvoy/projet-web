<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $table = 'events';

    protected $fillable = array(
        'title_event',
        'event',
        'picture_event',
        'start_date',
        'state_event',
        'time_event',
        'time_between_each',
        'number_event',
        'price_event'
    );

    protected $attributes = array(
        'time_between_each' => '00:00:00',
        'number_event' => '0',
        'state_event' => 'up'
    );

    public function picture() {
        return $this->hasMany('Models\Model\Picture');
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