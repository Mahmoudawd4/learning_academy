<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trainer;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

// use Image;


class TrainerController extends Controller
{
    //
    public function index()
    {
        $data['trainers']=Trainer::orderBy('id' ,'desc')->get();
        return view('Admin.trainers.index')->with($data);

    }

    public function create()
    {
        return view('Admin.trainers.create');
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
        Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/'.$new_name));
        $data['img']=$new_name;


        Trainer::create($data);

        return redirect(route('Admin.trainer.index'));
    }

    public function edit($id)
    {
       $trainer=Trainer::FindOrFail($id);
        return view('Admin.trainers.edit' ,compact('trainer'));

    }


    public function update(Request $request ,$id)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'phone'=>'nullable|string|max:50',
            'spec'=>'required|string|max:20',
            'img'=>'nullable|image|mimes:jpg,jpeg,png',
        ]);

      $trainer=Trainer::findOrFail($id);
      $old_name=$trainer->img;


      if($request->hasFile('img'))
      {

           //delete elsoura elkdema
        //    Storage::disk('uploads/trainers/')->delete($old_name);
           Storage::disk('uploads')->delete('trainers/'.$old_name);
            //erfa3 ehsoura
           $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/'.$new_name));
            $data['img']=$new_name;
      }else
      {
          $data['img']=$old_name;
      }

      $trainer->update($data);

        return back();
    }

    public function delete($id)
    {
        $trainer =Trainer::FindOrFail($id);
        $old_name=$trainer->img;
        Storage::disk('uploads')->delete('trainers/'.$old_name);

       $trainer->delete();
        return back();
    }

}
