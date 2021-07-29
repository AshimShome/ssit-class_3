<?php

namespace Database\Seeders;
use App\Models\post;

use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,30) as $index){
        //for($i=1;$i<=5;$i++) {
            $faker = Factory::create();

            post::created(['user_id' => rand(1, 6),
                'category_id' => rand(1, 8),
                'title' =>$faker->text,
                'description' =>$faker->paragraph(2,true),
                'image' =>$faker->imageUrl(),
                'status' => random_status(),
        ]);
        }
    }

}
