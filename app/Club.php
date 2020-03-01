<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model{
    
    public $guarded  = [];

    public function events(){
        return $this->hasMany(Event::Class);
    }
}
