<?php

namespace Database\Seeders;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     *
     */
    public function run()
    {

        User::create([

            'firstName' =>"Ashim",
            'lastName' => "Shome",
            'email' =>"ashimtapu@gmail.com",
            'password' => Hash::make("12345678")

        ]);

        //foreach (range(1,10) as $index){
        for($i=1;$i<=8;$i++){
            $faker = Factory::create();

            User::create([

            'firstName' => $faker ->firstName,
            'lastName' => $faker ->lastName,
            'email' => $faker ->unique()->email,
            'password' => Hash::make("12345")

        ]);
    }

    }
}
