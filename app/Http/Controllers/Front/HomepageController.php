<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\SiteContent;
use App\Student;
use App\Test;
use App\Trainer;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //
    public function index()
    {
        //elklam el fe site content
        $data['banner']=SiteContent::select('content')->where('name','banner')->first();
        $data['courses_content']=SiteContent::select('content')->where('name','courses')->first();




        //bageeb el courses
        $data['courses']=Course::orderBy('id','desc')->take(3)->get();

        //elcounter
        $data['courses_count']=Course::count();
        $data['student_count']=Student::count();
        $data['traine_count']=Trainer::count();

        //feedback student
        $data['tests']=Test::select('name','spec','desc','img')->get();


        return view('index')->with($data);
    }
}
