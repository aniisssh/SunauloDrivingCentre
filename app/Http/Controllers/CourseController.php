<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Vehicle;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Courses::all();
        $description=Courses::all()->pluck('description');
        return view('admin.courses.index',[
            'courses'=>$courses,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course=new Courses();
        $course->name=$request->input('name');
        $course->description=$request->input('description');
        $course->fee=$request->input('fee');
        $course->duration=$request->input('duration');
        $course->availability=$request->input('availability');

        $course->save();

        if($request->has('snc')){
            return redirect('admin/courses/create');
        }

        return redirect('admin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses=Courses::findOrFail($id);
        return view('admin.courses.edit',[
            'courses'=>$courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses)
    {
        $courses->name=$request->input('name');
        $courses->description=$request->input('description');
        $courses->fee=$request->input('fee');
        $courses->duration=$request->input('duration');
        $courses->availability=$request->input('availability');
        $courses->save();

        return redirect('admin/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses=Courses::find($id);

        $courses->delete();
        return redirect('admin/courses');
    }
}
