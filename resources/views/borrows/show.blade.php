@extends('layouts.admin')
@section('content')




    <a href="/borrows" class="btn btn-secondary">Go Back</a>
    <br>


    <h3>{{$borrow->student->first_name}} Information</h3>


    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>

            <th scope="col">Name of Student</th>
            <th scope="col">Grade</th>
            <th scope="col">Book Title</th>
            <th scope="col">Book Author</th>
            <th scope="col">Date Received</th>
            <th scope="col">Date Returned</th>
            <th scope="col">Comment</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>

        <tr>
            <td>
                <h6>{{$borrow->student->first_name}} {{$borrow->student->last_name}}</h6>

            </td>
            <td>
                <h6>{{$borrow->student->level}}</h6>

            </td>
            <td>
                <h6>{{$borrow->book->title}}</h6>

            </td>
            <td>
                <h6>{{$borrow->book->author}}</h6>

            </td>
            <td>
                <h6>{{$borrow->borrow_date}}</h6>

            </td>
            <td>
                <h6>{{$borrow->date_returned}}</h6>

            </td>
            <td>
                <h6>{{$borrow->comment}}</h6>

            </td>



            <td>
                <a href="/borrow/{{$borrow->id}}/edit" class="btn btn-primary">Edit</a>

            </td>

            <td>
                {!!Form::open(['action'=>['App\Http\Controllers\BorrowsController@destroy',$borrow->id],'method' =>'POST'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}

            </td>

        </tr>
    </table>



@endsection
