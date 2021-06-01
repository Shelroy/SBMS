@extends('layouts.app')
@section('content')




    <a href="/books" class="btn btn-secondary">Go Back</a>
    <br>


    <h3>{{$book->title}} Information</h3>


    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Department</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>


        </tr>
        </thead>

        <tr>
            <td>
                <h6>{{$book->id}}</h6>

            </td>
            <td>
                <h6>{{$book->title}}</h6>

            </td>
            <td>
                <h6>{{$book->author}}</h6>

            </td>
            <td>
                <h6>{{$book->department->name}}</h6>

            </td>
            <td>
                <h6>{{$book->description}}</h6>

            </td>
            <td>
                <h6>{{$book->quantity}}</h6>

            </td>



            <td>
                <a href="/books/{{$book->id}}/edit" class="btn btn-primary">Edit</a>

            </td>

            <td>
                {!!Form::open(['action'=>['App\Http\Controllers\BooksController@destroy',$book->id],'method' =>'POST'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}

            </td>

        </tr>
    </table>



@endsection
