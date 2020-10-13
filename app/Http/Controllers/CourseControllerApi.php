<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;

class CourseControllerApi extends Controller
{

    public function getAll()
    {
        $courses=Course::get();
        return response()->json($courses);
    }

    public function show($c_id)
    {
        $courses=Course::findOrFail($c_id);
        return response()->json($courses);
    }

    public function cat($id)
    {
        $data['cat']=Category::findOrFail($id);
        $data['course']=Course::where('category_id',$id)->get();
        return response()->json($data);
    }
}
