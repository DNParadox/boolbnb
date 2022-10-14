<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $services = [
            [
                'name' => 'WiFi',
                'icon' => 'fa-solid fa-wifi'
            ],
            [
                'name' => 'Posto macchina',
                'icon' => 'fa fa-car'
            ],
            [
                'name' => 'Piscina',
                'icon' => 'fas fa-swimming-pool'
            ],
            [
                'name' => 'Portineria',
                'icon' => 'fas fa-door-open'
            ],
            [
                'name' => 'Sauna',
                'icon' => 'fas fa-water'
            ],
            [
                'name' => 'Vista mare',
                'icon' => 'fa-solid fa-umbrella-beach'
            ],
            [
                'name' => 'BBQ',
                'icon' => 'fa-solid fa-fire-burner'
            ],
            [
                'name' => 'Colazione in camera',
                'icon' => 'fa-solid fa-mug-saucer'
            ],
            [
                'name' => 'Palestra',
                'icon' => 'fas fa-dumbbell'
            ],
            [
                'name' => 'Animali ammessi',
                'icon' => 'fas fa-dog'
            ],
            [
                'name' => 'Camera non fumatori',
                'icon' => 'fa-solid fa-ban-smoking'
            ],
            [
                'name' => 'Navetta',
                'icon' => 'fa-solid fa-taxi'
            ]
        ];

        foreach($services as $service) {
            $serviced = new Service();
            $serviced->name = $service['name'];
            $serviced->icon = $service['icon'];
            $serviced->save();
        }
    }
}
