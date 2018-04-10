<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model{

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

    public function picture(){
        return $this->hasMany('Models\Picture');
    }

    public function resgister(){
        return $this->hasMany('Models\Registered');
    }
    
    /**
     * Has Many Through relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasManyThrough
     */
    public function comment(){
        return $this->hasManyThrough('Models\Comment', 'Models\Registered');
    }

    public $timestamps = false;

}

?>