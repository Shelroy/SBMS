<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Eloquent\Model;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $student = Student::count();
        $book = Book::count();
        $borrow = Borrow::count();
        // this will sum the quantity of the column in the books table
        $quantity = DB::table("books")->sum('quantity');
    // to return multile variables to the view, you will need to use multiple 'with function' and pass the
    //variables in as in example below.

        return view('home')->with('book',$book )->with('student',$student)->with('borrow',$borrow)->with('quantity',$quantity);;


        return $book;
    }

}
