<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    public $guarded  = [];

    public function sub_category(){
        return $this->hasMany(Subcategory::class);
    }
}
