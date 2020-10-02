<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $fillable=[

        'name','desc','spec','img'

    ];

    protected $guarded=[
        'id'
    ];
    
}
