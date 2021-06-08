@extends('layouts.admin')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Search results</h1>
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
                <h3 class="card-title">List of all Students in the database</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               @if(count($students) > 0)
                <table id="example2" class="table table-bordered table-hover">
                  <thead>

                  <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Grade</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($students as $student)

                  <tr>
                      <td>{{$student->id}}</td>
                    <td><a href="/students/{{$student->id}}"> {{$student->last_name}}</a></td>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->level}}</td>
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

                  {{$students->links()}}
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
