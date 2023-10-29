<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=DB::table('Students')->orderby('student_id','ASC')->get();
        return view('admin.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $classes=DB::table('classes')->get();
        return view('admin.students.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id'=>'required',
            'student_id' => 'required|unique:students',
            'name' => 'required',
            'phone' =>'required',
            'email'=> 'required',
        ]);

        $data=array(
            'class_id'=> $request->class_id,
            'student_id' => $request->student_id,
            'name' => $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
        );
            DB::table('students')->insert($data);
            return redirect()->back()->with('success','Succesfully Registered');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes=DB::table('classes')->get();
        $student=DB::table('students')->where('id',$id)->first();
        return view('admin.students.edit',compact('classes','student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'class_id'=>'required',
            'student_id' => 'required',
            'name' => 'required',
            'phone' =>'required',
            'email'=> 'required',
        ]);
        $data=array(
            'Class_id'=> $request->class_id,
            'Student_id'=> $request->student_id,
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
        );
        DB::table('students')->where('id',$id)->update($data);
        return redirect()->route('students.index')->with('success','Succesfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success','successfully Deleted');
    }
}
