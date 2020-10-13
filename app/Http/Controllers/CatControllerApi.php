<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CatControllerApi extends Controller
{
    //
    public function index()
    {
        $cats=Category::orderBy('id' ,'desc')->get();
        return response()->json($cats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:20'
        ]);

        Category::create([
            'name' =>$request->name
        ]);

        $success='successfully created category';

        return response()->json($success);
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

        $success='successfully updated category';

        return response()->json($success);
    }

    public function delete($id)
    {
       $cat =Category::FindOrFail($id);

       $cat->delete();
       
       $success='successfully deleted category';
       return response()->json($success);
    }

}
