@extends('layouts.admin')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Edit Transaction</h1>
           <a href="/borrows" class="btn btn-secondary">Go Back</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$borrow->student->first_name}} Information</h3>
              </div>
    <br>
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Name of Student</th>
          <th>Grade</th>
          <th>Book Title</th>
          <th>Book Author</th>
          <th>Date Received</th>
          <th>Date Returned</th>
          <th>Comment</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$borrow->student->first_name}} {{$borrow->student->last_name}}</td>
            <td>{{$borrow->student->level}}</td>
            <td>{{$borrow->book->title}}</td>
            <td>{{$borrow->book->author}}</td>
            <td>{{$borrow->borrow_date}}</td>
            <td>{{$borrow->date_returned}}</td>
            <td>{{$borrow->comment}}</td>
            <td><a href="/borrow/{{$borrow->id}}/edit" class="btn btn-primary">Edit</a></td>
            <td>
                {!!Form::open(['action'=>['App\Http\Controllers\BorrowsController@destroy',$borrow->id],'method' =>'POST'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
            </td>
        </tr>
    </table>
@endsection
