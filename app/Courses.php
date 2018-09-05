<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public $table="courses";

    public function enquiry(){
        return $this->hasMany('App\Enquirees','course_id');
    }
}
