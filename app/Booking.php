<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $table='bookings';   


    public function enquirees(){
        return $this->belongsTo('App\Enquirees','enquiry_id');
    }
    public function trainers(){
        return $this->belongsTo('App\Trainers','trainer_id');
    }
    public function shift(){
        return $this->belongsTo('App\Shift','shift_id');
    }
}