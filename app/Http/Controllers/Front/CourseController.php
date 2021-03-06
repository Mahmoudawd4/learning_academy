<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function cat($id)
    {

        $data['cat']=Category::findOrFail($id);
        $data['courses']=Course::where('category_id',$id)->paginate(3);

        return view('forent.courses.cat')->with($data);
    }

    public function show($id ,$c_id)
    {
        $data['courses']=Course::findOrFail($c_id);
        return view('forent.courses.show')->with($data);
    }

    public function getCourses()
    {
        $data['allCourses']=Course::get();
        return view('forent.courses.getCourses')->with($data);
    }
    public function search(Request $request)
    {
        $keyword=$request->keyword;

        $course=Course::with('category')->where('name','LIKE' ,"%$keyword%")->get();

            return response()->json($course);

    }
}
