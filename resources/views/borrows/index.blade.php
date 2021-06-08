@extends('layouts.admin')
@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Distributed Books</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Borrowed Books</li>
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
                <h3 class="card-title">List of all Books distributed</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               @if(count($borrows) > 0)
                <table id="example2" class="table table-bordered table-hover">
                  <thead>

                  <tr>
                    <th>Book ID</th>
                    <th>Student Name</th>
                    <th>Book Title</th>
                    <th>Book Author</th>
                    <th>Borrow Date</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($borrows as $borrow)

                  <tr>
                      <td>{{$borrow->book->id}}</td>
                    <td><a href="/borrows/{{$borrow->id}}"> {{$borrow->student->first_name}} {{$borrow->student->last_name}}</a>
</a></td>
                    <td>{{$borrow->book->title}}</td>
                    <td>{{$borrow->book->author}}</td>
                    <td>{{$borrow->borrow_date}}</td>
                  </tr>
                  </tbody>
                  @endforeach
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Grade</th>
                  </tr>
                  </tfoot>
                  </table>

                  {{$borrows->links()}}
                  @else
                  <p>No post found</p>
                  @endif
                  @endsection
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
