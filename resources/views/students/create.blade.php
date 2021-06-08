@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Student</h3>
      </div>
    {!! Form::open(['action' => 'App\Http\Controllers\StudentsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="card-body">
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
        {{Form::label('guardian_first_name','Parent First Name')}}
        {{Form::text('guardian_first_name','',['class'=>'form-control','placeholder'=>'Parent First Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('guardian_last_name','Parent Last Name')}}
        {{Form::text('guardian_last_name','',['class'=>'form-control','placeholder'=>'Parent Last Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('phone','Parent Phone Number')}}
        {{Form::text('phone','',['class'=>'form-control','placeholder'=>'Parent Phone Number'])}}
    </div>
    <div class="form-group">
        {{Form::label('comment','Comment')}}
        {{Form::textarea('comment','',['class'=>'form-control','placeholder'=>'Comment'])}}
    </div>
    </div>
      <div class="card-footer">
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
  </div>
    {!! Form::close() !!}

  </div>
</div>
</div>
</div>
@endsection
