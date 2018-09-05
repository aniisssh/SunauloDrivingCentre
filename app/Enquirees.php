<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquirees extends Model
{
    public $table="enquiries";

    public function courses(){
        return $this->belongsto('App\Courses','course_id');
     }
     public function fullName(){
         return $this->first_name.' '.$this->last_name;
     }
}
