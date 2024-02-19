<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use GuzzleHttp\Client;

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
            $apartment->address = $faker->address();
            $lat_lon = $this->getCoordinatesFromAddress($apartment->address);
            $apartment->latitude = $lat_lon[0];
            $apartment->longitude = $lat_lon[1];
            $apartment->price = $faker->randomFloat(2, 1, 99999);
            $apartment->dimension_mq = $faker->numberBetween(0, 65534);
            $apartment->rooms_number = $faker->numberBetween(2, 100);
            $apartment->beds_number = $faker->numberBetween(1, 100);
            $apartment->bathrooms_number = $faker->numberBetween(1, 100);
            $apartment->is_visible = $faker->numberBetween(0, 1);

            $apartment->save();
        }
    }
    public static function getCoordinatesFromAddress(string $address): array
    {
        $client = new Client();
        $response = $client
            ->get('https://api.tomtom.com/search/2/geocode/'.urlencode($address).'.json', [
            'query' => [
                'key' => 'bZhPA555PRZ2tCDM2RaSbbHm4xg1LwVn',
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $latitude = $data['results'][0]['position']['lat'];
        $longitude = $data['results'][0]['position']['lon'];

        return compact('latitude', 'longitude');
    }
}

