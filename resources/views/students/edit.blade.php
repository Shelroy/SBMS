@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Student</h3>
      </div>


    {!! Form::open(['action' => ['App\Http\Controllers\StudentsController@update',$student->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="card-body">
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
        {{Form::number('level',$student->level,['class'=>'form-control','placeholder'=>'Level'])}}
    </div>
    <div class="form-group">
        {{Form::label('comment','Comment')}}
        {{Form::textarea('comment',$student->comment,['class'=>'form-control','placeholder'=>'Comment'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
  </div>
  </div>
</div>
</div>
</div>


@endsection
