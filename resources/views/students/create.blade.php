@extends('layouts.app')
@section('content')


    <h1>Add Student</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\StudentsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

   <div class="form-group">
       {{Form::label('first_name','First Name')}}
       {{Form::text('first_name','',['class'=>'form-control','placeholder'=>'First Name'])}}
   </div>
    <div class="form-group">
        {{Form::label('last_name','Last Name')}}
        {{Form::text('last_name','',['class'=>'form-control','placeholder'=>'Last Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('level','Grade')}}
        {{Form::number('level','',['class'=>'form-control','placeholder'=>'Grade'])}}
    </div>
    <div class="form-group">
        {{Form::label('comment','Comment')}}
        {{Form::textarea('comment','',['class'=>'form-control','placeholder'=>'Comment'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
