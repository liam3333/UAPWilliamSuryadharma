<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $gender = ['L', 'P'];

        for($i = 1; $i < 13; $i++) {
            User::create([
                "name" => $faker->name(),
                "password" => $faker->text(),
                "gender" => $gender[array_rand($gender)],
                "hobbies" => $faker->text(),
                "instagram" => $faker->text(),
                "phone" => $faker->phoneNumber(),
                "photo" => $faker->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
                "wallet" => 0
            ]);
        }
        // User::create([
        //     "photo" => "",
        //     "name" => "William Suryadharma",
        //     "hobbies" =>  "Tes"
        // ]);

        // $table->string('gender');
        // $table->string('hobbies');
        // $table->string('instagram');
        // $table->string('phone');
        // $table->string('photo');
    }
}
