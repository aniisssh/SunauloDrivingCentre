<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Enquirees;
use Illuminate\Http\Request;


class EnquireesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.enquiries.index',[
            'enquirees'=>Enquirees::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.enquiries.create',[
            'enquirees'=>Enquirees::all(),
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
        $enquirees=new Enquirees();
        $enquirees->first_name=$request->input('first_name');
        $enquirees->last_name=$request->input('last_name');
        $enquirees->email=$request->input('email');
        $enquirees->address=$request->input('address');
        $enquirees->course_id=$request->input('course_id');
        $enquirees->contact_no=$request->input('contact_no');
        $enquirees->date_of_birth=$request->input('date_of_birth');
        $enquirees->remarks=$request->input('remarks');

        $enquirees->save();
        if($request->has('snc')){
            return redirect('admin/enquiries/create');
        }
        return redirect('admin/enquiries');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquirees  $enquirees
     * @return \Illuminate\Http\Response
     */
    public function show(Enquirees $enquirees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquirees  $enquirees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.enquiries.edit',[
            'enquirees'=>Enquirees::findOrFail($id),
            'courses'=>Courses::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enquirees  $enquirees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquirees $enquirees)
    {
        $enquirees->first_name=$request->input('first_name');
        $enquirees->last_name=$request->input('last_name');
        $enquirees->email=$request->input('email');
        $enquirees->address=$request->input('address');
        $enquirees->course_id=$request->input('course_id');
        $enquirees->contact_no=$request->input('contact_no');
        $enquirees->date_of_birth=$request->input('date_of_birth');
        $enquirees->remarks=$request->input('remarks');

        $enquirees->save();
        return redirect('admin/enquiries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquirees  $enquirees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquiry=Enquirees::find($id);
        $enquiry->delete();

        return redirect('admin/enquiries');
    }
}
