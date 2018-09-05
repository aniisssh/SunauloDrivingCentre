<?php

namespace App\Http\Controllers;

use App\Trainers;
use Illuminate\Http\Request;
use App\Http\Requests\TrainerFormRequest;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.trainers.index',[
            'trainers'=>Trainers::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainerFormRequest $request)
    {
        $trainers=new Trainers();
        $trainers->first_name=$request->input('first_name');
        $trainers->last_name=$request->input('last_name');
        $trainers->email=$request->input('email');
        $trainers->address=$request->input('address');
        $trainers->contact_no=$request->input('contact_no');
        $trainers->status=$request->input('status');
        
        $trainers->save();

        if($request->has('snc')){
            return redirect('admin/trainers/create');
        }

        return redirect('admin/trainers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainers  $trainers
     * @return \Illuminate\Http\Response
     */
    public function show(Trainers $trainers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainers  $trainers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.trainers.edit',[
            'trainer'=>Trainers::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainers  $trainers
     * @return \Illuminate\Http\Response
     */
    public function update(TrainerFormRequest $request, Trainer $trainer)
    {
        $trainers->first_name=$request->input('first_name');
        $trainers->last_name=$request->input('last_name');
        $trainers->email=$request->input('email');
        $trainers->contact_no=$request->input('contact_no');
        $trainers->status=$request->input('status');
        $trainers->address=$request->input('address');

        $trainers->save();

        return redirect('admin/trainers');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainers  $trainers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainers=Trainers::find($id);

        $trainers->delete();
        return redirect('admin/trainers');
    }
}
