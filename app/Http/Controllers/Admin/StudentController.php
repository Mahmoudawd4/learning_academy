<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    //
    public function index()
    {
        $data['students']=Student::orderBy('id' ,'desc')->get();
        return view('Admin.students.index')->with($data);

    }

    public function create()
    {
        return view('Admin.students.create');
    }
    public function store(Request $request)
    {
      $data=$request->validate([
            'name'=>'nullable|string|max:50',
            'email'=>'required|email|max:50|unique:students',
            'spec'=>'nullable|string|max:20',
        ]);

        Student::create($data);

        return redirect(route('Admin.students.index'));
    }

    public function edit($id)
    {
       $student=Student::FindOrFail($id);
        return view('Admin.students.edit' ,compact('student'));

    }


    public function update(Request $request ,$id)
    {
        $request->validate([
            'name'=>'nullable|string|max:50',
            'email'=>'required|email|max:50|unique:students',
            'spec'=>'nullable|string|max:20',
        ]);

        $student=Student::FindOrFail($id);
        $student->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'spec' =>$request->spec
        ]);

        return back();
    }

    public function delete($id)
    {
        $student =Student::FindOrFail($id);
       $student->delete();
        return back();
    }

    public function showCourses($id)
    {
        $data['courses']=Student::findOrFail($id)->Courses;
        $data['student_id']=$id;

        return view('Admin.students.showCourses')->with($data);
    }


    public function approveCourses($id ,$c_id)
    {
        DB::table('course_student')->where('student_id' , $id)->where('course_id' , $c_id)->update([
            'status' =>'approve'
        ]);

        return back();
    }
    public function rejectCourses($id ,$c_id)
    {
        DB::table('course_student')->where('student_id',$id)->where('course_id' , $c_id)->update([
            'status' =>'reject'
        ]);

        return back();
    }


    public function addCourse($id)
    {
        $data['student_id']=$id;
        $data['courses']=Course::select('id','name')->get();
        return view('Admin.students.addCourse')->with($data);
    }

    public function storeCourse($id ,Request $request)
    {
        $data=$request->validate([
            'course_id'=>'required|exists:courses,id'
        ]);

        DB::table('course_student')->insert([
            'student_id' =>$id ,
            'course_id' =>$data['course_id']
        ]);

        return redirect(route('Admin.show-courses.student' ,$id));


    }
}
