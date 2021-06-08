@extends('layouts.admin')
@section('content')
    <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
               <h1>Books</h1>
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
                    <h3 class="card-title">List of all Books in the database</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    @if(count($books) > 0)

                    <table id="example2" class="table table-bordered table-hover">
                      <thead>

                      <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Quantity</th>
                      </tr>
                      </thead>

                      <tbody>
                        @foreach($books as $book)
                        <tr>
                          <td>{{$book->id}}</td>
                          <td><a href="/books/{{$book->id}}"> {{$book->title}}</a> </td>
                          <td>{{$book->author}}</td>
                          <td>{{$book->description}}</td>
                          <td>{{$book->quantity}}</td>
                        </tr>
                      </tbody>
                      @endforeach
                      <tfoot>
                      <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Quantity</th>

                      </tr>
                      </tfoot>
                      </table>
                      {{$books->links()}}
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
