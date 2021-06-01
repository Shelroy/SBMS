@extends('layouts.app')
@section('content')
    <h1>List of books borrowed</h1>
    @if(count($borrows) > 0)
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Book ID</th>
                <th scope="col">Book Title</th>
                <th scope="col">Book Author</th>
                <th scope="col">Borrow Date</th>
            </tr>
            </thead>
            @foreach($borrows as $borrow)
                <tr>
                    <td>
                        {{--when this link  is clicked it will call the show function in the students controller --}}
                        <h6><a href="/borrows/{{$borrow->id}}"> {{$borrow->student->first_name}} {{$borrow->student->last_name}}</a></h6>
                    </td>
                    <td>
                        <h6>{{$borrow->book->id}}</h6>
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
                </tr>
            @endforeach
        </table>
        {{$borrows->links()}}
    @else
        <p>No post found</p>
    @endif
@endsection
