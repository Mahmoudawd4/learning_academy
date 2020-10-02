<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Message;
use App\Newsletter;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    //

    public function newsletter(Request $request)
    {

        $data=$request->validate([
            'email'=>'required|email'
        ]);
        Newsletter::create($data);

        return back();

    }
    public function contact(Request $request)
    {

        // dd($request->email);

        $data=$request->validate([

            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191',
            'subject'=>'nullable|string|max:191',
            'message'=>'required|string|max:191'
        ]);
        Message::create($data);
        return back();

    }


    public function enroll(Request $request)
    {

        dd($request->email);

        $data=$request->validate([

            'name'=>'nullable|string|max:191',
            'email'=>'required|email|max:191',
            'spec'=>'nullable|string|max:191',
            'course_id'=>'nullable|exists:courses,id'
        ]);
       $student= Student::create([
            'name'=> $data['name'] ,
            'email'=> $data['email'] ,
            'spec'=> $data['spec']
        ]);

        $student_id=$student->id;
        DB::table('course_student')->insert([
            'course_id'=>$data['course_id'] ,
            'student_id'=>$student_id
        ]);
        return back();

    }


}
