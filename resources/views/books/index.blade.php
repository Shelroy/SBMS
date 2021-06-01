@extends('layouts.app')
@section('content')
    <h1>List of Books</h1>

    @if(count($books) > 0)
        <table class="table table-striped">

            <thead class="thead-dark">
            <tr>
                <th scope="col">Book ID</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
            </tr>
            </thead>


            @foreach($books as $book)
                <tr>
                    <td>
                        <h6>{{$book->id}}</h6>

                    </td>
                    <td>
                        {{--                    when this link  is clicked it will call the show function in the students controller --}}
                        <a href="/books/{{$book->id}}"> <h6>{{$book->title}}</h6></a>
                    </td>
                    <td>
                        <h6>{{$book->author}}</h6>

                    </td>
                    <td>
                        <h6>{{$book->description}}</h6>

                    </td>
                    <td>
                        <h6>{{$book->quantity}}</h6>

                    </td>

                </tr>
                {{--            <div class="card p-3 mt-3 mb-3">--}}
                {{--                <h6>{{$student->last_name}}</h6>--}}

                {{--            </div>--}}

            @endforeach
        </table>
        {{$books->links()}}

    @else
        <p>No post found</p>
    @endif

@endsection
