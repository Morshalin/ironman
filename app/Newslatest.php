<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newslatest extends Model{
    public $guarded  = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sub_category(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id','id');
    }

    public function user(){
        return $this->belongsTo(User::Class);
    }

}
