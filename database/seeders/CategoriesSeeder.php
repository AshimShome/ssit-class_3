<?php

namespace Database\Seeders;
use App\Models\Categories;
use Faker\Factory;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //foreach (range(1,10) as $index){
        for ($i = 1; $i <= 8; $i++) {
            $faker = Factory::create();
            $name=substr($faker->paragraph, 0, 10);
            Categories::create([
                'user_id'=>rand(1,6),
                'name' => $name,
                'slug' =>slugify($name),
                'status' => random_status(),


            ]);
        }
    }
        //public function random_status(){
            //$status=['active'=>'active','inactive'=>'inactive'];
           // $status=['active','inactive'];
            //return array_rand($status,1);


    //}



}
