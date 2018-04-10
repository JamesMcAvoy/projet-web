<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'users';

    protected $fillable = array(
        'name',
        'first_name',
        'email',
        'password',
        'type'
    );

    protected $attributes = array(
        'type' => 'student'
    );

    
    public function basket(){
        return $this->hasMany('Models\Basket');
    }
    public function order(){
        return $this->hasMany('Models\Order');
    }
    public function notification(){
        return $this->hasMany('Models\Notification');
    }
    public function idea(){
        return $this->hasMany('Models\Idea');
    }
    public function voted(){
        return $this->hasMany('Models\Voted');
    }
    public function registered(){
        return $this->hasMany('Models\Registered');
    }
    public function picture(){
        return $this->hasMany('Models\Picture');
    }
    public function liked(){
        return $this->hasMany('Models\Liked');
    }
    public function comment(){
        return $this->hasMany('Models\Comment');
    }
    
    public $timestamps = false;

}