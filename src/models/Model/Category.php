<?php

namespace Models\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';

    protected $fillable = array(
        'category_name'
    );

    public function item() {
        return $this->hasMany('Models\Model\Item');
    }

    public $timestamps = false;

}

?>