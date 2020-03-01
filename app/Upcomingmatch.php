<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upcomingmatch extends Model{
    public $guarded  = [];

    public function category(){
        return $this->belongsTo(Category::Class, 'category_id','id');
    }

    public function event(){
        return $this->belongsTo(Event::Class);
    }
}
