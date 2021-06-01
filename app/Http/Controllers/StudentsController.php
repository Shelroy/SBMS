<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{

    /**
     * This allows for session control- basically you must be logged in to create, delete or edit a post
     * you can view the index page and show page without loggin in
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // this except at the end will allows us to make eceptions to some of the pages that we
        // dont need to loged in to in order to view them
        $this->middleware('auth',['except'=>['index']]);
    }

    /**
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // take all of the records in students table and store in a variable call students
//       $students = Post::all();
//        $students = Student::orderBy('last_name','asc')->get();
        $students = Student::orderBy('last_name','asc')->simplePaginate(10);

        // now return those data to the view
        return view ('students.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');

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
            'first_name'=> 'required',
            'last_name'=> 'required',
            'level'=> 'required',
            'comment'=> ''
        ]);

        // get data entered into the form and send to table
        $student = new Student;
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->level = $request->input('level');
        $student->comment = $request->input('comment');
        $student->user_id = auth()->user()->id;
        $student->save();

        return redirect('/students')->with('success','Student created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return the individual student from the database based on the Id received from the student contorller
       // go to the Student Model and find the $id that came from the controller



        $student = Student::find($id);
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
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
            'first_name'=> 'required',
            'last_name'=> 'required',
            'level'=> 'required',
            'comment'=> ''
        ]);

        // get data entered into the form - this is update data back into the database
        $student = Student::find($id);
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->level = $request->input('level');
        $student->comment = $request->input('comment');
        $student->save();

        return redirect('/students')->with('success','Student Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/students')->with('success','Student Removed');


    }
}
