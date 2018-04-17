<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'users';

    protected $fillable = array(
        'name_user',
        'first_name',
        'email',
        'password',
        'type'
    );

    protected $attributes = array(
        'type' => 'student'
    );
    
    //protected $primaryKey = 'user_id';
    
    public function basket() {
        return $this->hasOne('Models\Model\Basket');
    }
    public function order() {
        return $this->hasMany('Models\Model\Order');
    }
    public function notification() {
        return $this->hasMany('Models\Model\Notification', 'notif_id');
    }
    public function idea() {
        return $this->hasMany('Models\Model\Idea');
    }
    public function voted() {
        return $this->hasMany('Models\Model\Voted');
    }
    public function registered() {
        return $this->hasMany('Models\Model\Registered');
    }
    public function picture() {
        return $this->hasMany('Models\Model\Picture');
    }
    public function liked() {
        return $this->hasMany('Models\Model\Liked');
    }
    public function comment() {
        return $this->hasMany('Models\Model\Comment');
    }
    
    public $timestamps = false;

}