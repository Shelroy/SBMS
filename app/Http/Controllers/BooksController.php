<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function __construct()
    {
        // this except at the end will allows us to make eceptions to some of the pages that we
        // dont need to loged in to in order to view them
        $this->middleware('auth',['except'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('title','asc')->simplePaginate(10);
        return view ('books.index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }
    public function test2(){
        $book = Book::count();
        return view('home')->with('book',$book);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'department_id'=>'required',
            'description'=>'',
            'quantity'=>'required'
        ]);
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->department_id = $request->input('department_id');
        $book->description = $request->input('description');
        $book->quantity = $request->input('quantity');
        $book->user_id = auth()->user()->id;
        $book->save();
        // after entering data into database, redirect to books index page
        return redirect('/books')->with('success','Book added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('/books.show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit')->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'department_id'=>'required',
            'description'=>'',
            'quantity'=>'required'
        ]);
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->department_id = $request->input('department_id');
        $book->quantity = $request->input('quantity');
        $book->user_id = auth()->user()->id;
        $book->save();
        // after entering data into database, redirect to books index page
        return redirect('/books')->with('success','Book Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/books')->with('success','Book Removed');


    }
}
