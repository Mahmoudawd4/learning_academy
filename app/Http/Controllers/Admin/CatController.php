<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatController extends Controller
{
    //
    public function index()
    {
        $data['cats']=Category::orderBy('id' ,'desc')->get();
        return view('Admin.cats.index')->with($data);

    }

    public function create()
    {
        return view('Admin.cats.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:20'
        ]);

        Category::create([
            'name' =>$request->name
        ]);

        return redirect(route('Admin.cats.index'));
    }

    public function edit($id)
    {
       $cat=Category::FindOrFail($id);
        return view('Admin.cats.edit' ,compact('cat'));

    }


    public function update(Request $request ,$id)
    {
        $request->validate([
            'name' =>'required|string|max:100'
        ]);

        $cat=Category::FindOrFail($id);

        $cat->update([
            'name' =>$request->name
        ]);

        return back();
    }

    public function delete($id)
    {
       $cat =Category::FindOrFail($id);
       
       $cat->delete();
        return back();
    }

}
