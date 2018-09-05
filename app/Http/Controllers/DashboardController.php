<?php

namespace App\Http\Controllers;

use App\Enquirees;
use App\Booking;
use App\Courses;
use App\Shift;
use App\Dashboard;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
  public function index(){
      return view('admin.dashboard',[
        'courses'=>Courses::all()->count(),
        'enquirees'=>Enquirees::all()->count(),
        'bookings'=>Booking::all()->count(),
        'shifts'=>Shift::all()->count(),
      ]);
  }
}
