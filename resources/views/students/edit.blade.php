@extends('layouts.admin')
@section('content')


    <h1>Edit Student</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\StudentsController@update',$student->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('first_name','First Name')}}
        {{Form::text('first_name',$student->first_name,['class'=>'form-control','placeholder'=>'First Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('last_name','Last Name')}}
        {{Form::text('last_name',$student->last_name,['class'=>'form-control','placeholder'=>'Last Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('level','Level')}}
        {{Form::number('level',$student->title,['class'=>'form-control','placeholder'=>'Level'])}}
    </div>
    <div class="form-group">
        {{Form::label('comment','Comment')}}
        {{Form::textarea('comment',$student->comment,['class'=>'form-control','placeholder'=>'Comment'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
