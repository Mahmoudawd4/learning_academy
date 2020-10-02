<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $fillable=[
        'name','email','spec'

    ];

    //student belongsToMany Course
    public function Courses()
    {
        return $this->belongsToMany('App\Course');
    }
}
