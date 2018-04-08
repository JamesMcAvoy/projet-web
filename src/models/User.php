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

    public $timestamps = false;

}