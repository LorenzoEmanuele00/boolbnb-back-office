<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $apartment = new Apartment();
            $apartment->title = $faker->sentence(5);
            $apartment->slug = Str::slug($apartment->title);
            $apartment->address =
            $apartment->latitude = 
            $apartment->longitude = 
            $apartment->price = $faker->randomFloat(2, 1, 99999);
            $apartment->dimension_mq = $faker->numberBetween(0, 65534);
            $apartment->rooms_number = $faker->numberBetween(2, 100);
            $apartment->beds_number = $faker->numberBetween(1, 100);
            $apartment->bathrooms_number = $faker->numberBetween(1, 100);
            $apartment->is_visible = $faker->numberBetween(0, 1);

            $apartment->save();
        }
    }
}
