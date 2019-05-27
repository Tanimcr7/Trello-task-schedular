<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp = Student::get();
        //return $temp;
        return view('welcome', compact("temp"));


    }
    public function ret_todo()
    {
       // $temp = Student::get();
        //return $temp;
        return view('todo');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_view');
    }

    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $student = new Student();
       $student->s_name = $request->s_name;
       $student->s_roll = $request->s_roll;
       $student->mark = $request->mark;

       $student->save();

       return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $temp = Student::where('id', $id)->first();
        return view('edit', compact("temp"));


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
        $student = Student::where('id', $id)->first();
        $student->s_name = $request->s_name;
        $student->s_roll = $request->s_roll;
        $student->mark = $request->mark;

        $student->update();

        return redirect('/');
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
        $student = Student::where('id',$id)->delete();
        return redirect('/');
    }
}
