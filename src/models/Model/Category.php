<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';

    protected $fillable = array(
        'name_category'
    );

    public function item() {
        return $this->hasMany('Models\Model\Item');
    }

    public $timestamps = false;

}

?>