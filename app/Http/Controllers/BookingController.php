<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Enquirees;
use App\Shift;
use App\Trainers;
use App\Courses;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bookings.index',[
            'bookings'=>Booking::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bookings.create',[
            'enquirees'=>Enquirees::all(),
            'trainers'=>Trainers::all(),
            'shifts'=>Shift::all(),
            'courses'=>Courses::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking=new Booking();
        $booking->enquiry_id=$request->input('enquiry_id');
        $booking->trainer_id=$request->input('trainer_id');
        $booking->discount=$request->input('discount');
        $booking->advance=$request->input('advance');
        $booking->book_date=$request->input('book_date');
        $booking->shift_id=$request->input('shift_id');

        $booking->save();

        if($request->has('snc')){
            return redirect('admin/bookings/create');
        }

        return redirect('admin/bookings');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('admin.bookings.edit',[
            'booking'=>Booking::findOrFail($id),
            'enquirees'=>Enquirees::all(),
            'trainers'=>Trainers::all(),
            'shifts'=>Shift::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->enquiry_id=$request->input('enquiry_id');
        $booking->trainer_id=$request->input('trainer_id');
        $booking->discount=$request->input('discount');
        $booking->advance=$request->input('advance');
        $booking->book_date=$request->input('book_date');
        $booking->shift_id=$request->input('shift_id');

        $booking->save();

        return redirect('admin/bookings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
