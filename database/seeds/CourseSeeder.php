<?php

use App\Course;
use Faker\Provider\HtmlLorem;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i <=3; $i++) {
            for ($e=0; $e <=6 ; $e++) {
                # code...
                Course::create([
                    'name'=> "coures num $e  cat num $e" ,
                    'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                    'content'=>'nam quam quas atque delectu modi expedita a, provident amet natus hic eius quod, enim nesciunt aspernatur ratione magni!',
                    'price'=>rand(1000,5000),
                    'img'=>"$i$e.png",
                    'category_id'=>$i ,
                    'trainer_id'=>rand(1,5),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }
        }
    }
}
