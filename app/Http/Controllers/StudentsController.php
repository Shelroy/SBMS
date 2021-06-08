<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Book;



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

    // the guardian is is added as a parameter to the store fuction since we will be adding data to the guardian model
    // from the form which is pointed to this function in the create view
    public function store(Request $request, Guardian $guardian)
    {
        $this->validate($request,[
            'first_name'=> 'required',
            'last_name'=> 'required',
            'level'=> 'required',
            'guardian_first_name'=>'required',
            'guardian_last_name'=>'required',
            'phone'=>'required',
            'comment'=> ''

        ]);
        // get data entered into the form and send to table
//        $query = DB::table('students')->join('guardians','guardians.student_id','students.id');

        $student = new Student;
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->level = $request->input('level');
        $student->comment = $request->input('comment');
        $student->user_id = auth()->user()->id;
        $student->save();

        // this will allow me to enter data from the create student form into the guardian table
        $guardian->student_id = $student->id;
        $guardian->phone = $request->input('phone');
        $guardian->first_name = $request->input('guardian_first_name');
        $guardian->last_name = $request->input('guardian_last_name');
        $guardian->save();



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

    public function search(Request $request){
      $search = $request->get('search');
      $students = DB::table('students')->where('first_name','like', '%'.$search.'%')->
      orWhere('last_name','like','%'.$search.'%')-> paginate(5);
      // $students = Student::WHERE('first_name','LIKE','%'.$search_text.'%')->with('books')->get();

    // return view('students.search',compact('students'));
    return view('students.search')->with('students', $students);
  }



}
