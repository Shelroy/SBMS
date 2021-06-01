<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $borrows = Borrow::orderBy('borrow_date','asc')->simplePaginate(10);

        return view ('borrows.index')->with('borrows', $borrows);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrows.create');
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
            'student_id'=>'required',
            'book_id'=>'required',
            'received_by'=>'required',
            'borrow_date'=>'required',
            'comment'=>''
        ]);
        $borrow = new Borrow();
        $borrow->student_id= $request->input('student_id');
        $borrow->book_id = $request->input('book_id');
        $borrow->received_by = $request->input('received_by');
        $borrow->borrow_date = $request->input('borrow_date');
        $borrow->comment = $request->input('comment');
        $borrow->user_id = auth()->user()->id;
        $borrow->save();
        // after entering data into database, redirect to books index page

        // Decrement one from the quantity column everytime you call the store method
        DB::table('books')->decrement('quantity', 1);



        return redirect('/borrows')->with('success','Database Updated');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrow = Borrow::find($id);
        return view('borrows.show')->with('borrow', $borrow);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
