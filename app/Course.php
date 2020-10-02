<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    protected $fillable=[
        'name' ,'desc','price','img','content','category_id','trainer_id'
    ];

    //Course beLongsTo Category

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

        //Course beLongsTo Trainer
    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }
        //Course beLongsToMany Stuent

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }



}
