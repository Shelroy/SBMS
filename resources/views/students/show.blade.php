@extends('layouts.app')
@section('content')




<a href="/students" class="btn btn-secondary">Go Back</a>
<br>


    <h3>{{$student->first_name}} Information</h3>


    <table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Level</th>
        <th scope="col">Comment</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

    </tr>
    </thead>

        <tr>
            <td>
                <h6>{{$student->id}}</h6>

            </td>
            <td>
                <h6>{{$student->first_name}}</h6>

            </td>
            <td>
                <h6>{{$student->last_name}}</h6>

            </td>
            <td>
                <h6>{{$student->level}}</h6>

            </td>
            <td>
                <h6>{{$student->comment}}</h6>

            </td>



        <td>
            <a href="/students/{{$student->id}}/edit" class="btn btn-primary">Edit</a>

        </td>

            <td>
                {!!Form::open(['action'=>['App\Http\Controllers\StudentsController@destroy',$student->id],'method' =>'POST'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}

            </td>

        </tr>
    </table>



@endsection
