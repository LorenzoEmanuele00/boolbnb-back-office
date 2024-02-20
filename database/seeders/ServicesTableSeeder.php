<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $services = ['Wi-Fi', 'Piscina', 'Servizio in Camera', 'Aria Condizionata', 'Posto Auto', 'Area Fumatori', 'Animali Ammessi']

        $services = [
            [
                'name' => 'Wi-Fi',
                'icon' => 'fa-solid fa-wifi'
            ],
            [
                'name' => 'Piscina',
                'icon' => 'fa-solid fa-umbrella-beach'
            ],
            [
                'name' => 'Servizio in Camera',
                'icon' => 'fa-solid fa-bell-concierge'
            ],
            [
                'name' => 'Area Fumatori',
                'icon' => 'fa-solid fa-smoking'
            ],
            [
                'name' => 'Aria Condizionata',
                'icon' => 'fa-solid fa-wind'
            ],
            [
                'name' => 'Posto Auto',
                'icon' => 'fa-solid fa-square-parking'
            ],
            [
                'name' => 'Animali Ammessi',
                'icon' => 'fa-solid fa-dog'
            ]
        ];
    }
}
