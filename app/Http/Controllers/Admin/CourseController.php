<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    //
    public function index()
    {


        $data['courses']=Course::orderBy('id' ,'desc')->get();
        return view('Admin.courses.index')->with($data);

    }

    public function create()
    {
        $data['cats']=Category::select('id' , 'name')->get();
        $data['trainers']=Trainer::select('id','name')->get();

        return view('Admin.courses.create')->with($data);

    }
    public function store(Request $request)
    {
      $data=$request->validate([
            'name'=>'required|string|max:50',
            'phone'=>'nullable|string|max:50',
            'spec'=>'required|string|max:20',
            'img'=>'required|image|mimes:jpg,jpeg,png'

        ]);

        $new_name=$data['img']->hashName();
        Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/courses/'.$new_name));
        $data['img']=$new_name;


        Course::create($data);

        return redirect(route('Admin.courses.index'));
    }

    public function edit($id)
    {
       $course=Course::FindOrFail($id);
        return view('Admin.courses.edit' ,compact('course'));

    }


    public function update(Request $request ,$id)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'phone'=>'nullable|string|max:50',
            'spec'=>'required|string|max:20',
            'img'=>'nullable|image|mimes:jpg,jpeg,png',
        ]);

      $course=Course::findOrFail($id);
      $old_name=$course->img;


      if($request->hasFile('img'))
      {

           //delete elsoura elkdema
        //    Storage::disk('uploads/courses/')->delete($old_name);
           Storage::disk('uploads')->delete('courses/'.$old_name);
            //erfa3 ehsoura
           $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/courses/'.$new_name));
            $data['img']=$new_name;
      }else
      {
          $data['img']=$old_name;
      }

      $course->update($data);

        return back();
    }

    public function delete($id)
    {
        $course =Course::FindOrFail($id);
        $old_name=$course->img;
        Storage::disk('uploads')->delete('courses/'.$old_name);

       $course->delete();
        return back();
    }

}
