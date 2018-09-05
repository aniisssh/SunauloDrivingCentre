@extends('adminlte::page')

@section('title', 'Edit Course Information')

@section('content_header')
    <div>
        <h1>Edit A Course</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="/admin/courses"><i class="fa fa-copyright"></i>Courses</a></li>
        <li class="active">Edit</li>
    </ol>
@stop

@section('content')
    {!!Form::open(['url'=>'admin/courses/'.$courses->id,'method'=>'put'])!!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" name="name" value="{{$courses->name}}" class="form-control"/>
                        <!-- @if($errors->first('name'))
                            <div class="label label-danger">
                                {{$errors->first('name')}}
                            </div>
                        @endif -->
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" value="{{$courses->description}}" placeholder="{{$courses->description}}leave as it is for the previous description" ></textarea>
                        <!-- @if($errors->first('description'))
                            <div class="label label-danger">
                                {{$errors->first('description')}}
                            </div>
                        @endif -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="textarea" name="duration"  value="{{$courses->duration}}" class="form-control"/>
                        <!-- @if($errors->first('duration'))
                            <div class="label label-danger">
                                {{$errors->first('duration')}}
                            </div>
                        @endif -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fee</label>
                        <input type="text" name="fee" value="{{$courses->fee}}" class="form-control" pattern="[0-9]+"/>
                        <!-- @if($errors->first('fee'))
                            <div class="label label-danger">
                                {{$errors->first('fee')}}
                            </div>
                        @endif -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Availability</label>
                        <select name="availability" class="form-control" >
                            <option value="{{$courses->availability}}">{{$courses->availability}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                        @if($errors->first('availability'))
                            <div class="label label-danger">
                                {{$errors->first('availability')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <!-- <input type="hidden" name="id" value="{{$courses->id}}"/> -->
            <a href="{{url('admin/courses')}}" class="btn btn-danger">Back</a>
    {!!Form::close()!!}
@endsection