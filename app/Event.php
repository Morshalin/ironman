<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model{
    public $guarded  = [];

    public function studium(){
        return $this->belongsTo(Studium::Class);
    }

    public function clubone(){
        return $this->belongsTo(Club::Class ,'clubone_id','id');
    }

    public function clubtwo(){
        return $this->belongsTo(Club::Class ,'clubtwo_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::Class);
    }

    public function singlematch(){
        return $this->belongsTo(Club::Class, 'single_club','id');
    }


    public function subcategory(){
        return $this->belongsTo(Subcategory::Class, 'subcategory_id','id');
    }
    public function user(){
        return $this->belongsTo(User::Class);
    }
}
