@extends('layouts.admin')
@section('content')


    <h1>List of students</h1>

    @if(count($students) > 0)
        <table class="table table-striped">

            <thead class="thead-dark">
            <tr>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Level</th>
            </tr>
            </thead>


        @foreach($students as $student)
            <tr>
                <td>
{{--                    when this link  is clicked it will call the show function in the students controller --}}
                    <h6><a href="/students/{{$student->id}}"> {{$student->last_name}}</a></h6>

                </td>
                <td>
                    <h6>{{$student->first_name}}</h6>

                </td>
                <td>
                    <h6>{{$student->level}}</h6>

                </td>

            </tr>
{{--            <div class="card p-3 mt-3 mb-3">--}}
{{--                <h6>{{$student->last_name}}</h6>--}}

{{--            </div>--}}

        @endforeach
        </table>
        {{$students->links()}}

    @else
    <p>No post found</p>
    @endif

@endsection
