@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Book</h3>
      </div>

    {!! Form::open(['action' => ['App\Http\Controllers\BooksController@update',$book->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="card-body">
    <div class="form-group">
        {{Form::label('title','Book Title')}}
        {{Form::text('title',$book->title,['class'=>'form-control','placeholder'=>'Book Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('author','Author')}}
        {{Form::text('author',$book->author,['class'=>'form-control','placeholder'=>'Book Author'])}}
    </div>
    <div class="form-group">
        {{Form::label('department-id','Department')}}
        {{Form::select('department_id', ['1' => 'Mathematics', '2' => 'English', '3' => 'Social Studies', '4' => 'Science','5' => 'Agricultural Science', '6' => 'Home Economics','7' => 'Business', '8' => 'Modern Language','9' => 'Industrial Technology', '10' => 'Allied Arts'],$book->department_id,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('description','Description')}}
        {{Form::textarea('description',$book->description,['class'=>'form-control','placeholder'=>'Book Description'])}}
    </div>
    <div class="form-group">
        {{Form::label('quantity','Quantity')}}
        {{Form::number('quantity',$book->quantity,['class'=>'form-control','placeholder'=>'Book Quantity'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
</div>
</div>
</div>
</div>
</div>
