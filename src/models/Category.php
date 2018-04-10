<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    protected $table = 'categories';

    protected $fillable = array(
        'name_gategory'
    );

    public function item(){
        return $this->hasMany('Models\Item');
    }

    public $timestamps = false;

}

?>