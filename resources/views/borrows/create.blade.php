@extends('layouts.admin')
@section('content')

    <h1>Distribute Book</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\BorrowsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('student_id','Student ID')}}
        {{Form::number('student_id','',['class'=>'form-control','placeholder'=>'Student ID'])}}
    </div>
    <div class="form-group">
        {{Form::label('book_id','Book ID')}}
        {{Form::number('book_id','',['class'=>'form-control','placeholder'=>'Book ID'])}}
    </div>
    <div class="form-group">
        {{Form::label('received_by','Received By')}}
        {{Form::text('received_by','',['class'=>'form-control','placeholder'=>'Received By'])}}
    </div>
    <div class="form-group">
        {{Form::label('borrow_date','Received Date')}}
        {{Form::date('borrow_date','',['class'=>'form-control','placeholder'=>'Received Date'])}}
    </div>

    <div class="form-group">
        {{Form::label('comment','Comment')}}
        {{Form::textarea('comment','',['class'=>'form-control','placeholder'=>'Comment'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
