<?php

namespace Database\Seeders;

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
        $faker = Factory::create();
        foreach (range(1,10) as $index){
        User::create([

            'firstName' => $faker ->fistNamer,
            'lastName' => "last_name",
            'email' => "admin@gmail.com",
            'password' => Hash::make("12345")

        ]);
    }

    }
}
