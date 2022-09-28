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
            'WiFi',
            'Posto macchina',
            'Piscina',
            'Portineria',
            'Sauna',
            'Vista mare',
            'BBQ',
            'Colazione in camera',
            'Palestra',
            'Animali ammessi',
            'Camera non fumatori',
            'Navetta',
        ];

        foreach($services as $service) {
            $serviced = new Service();
            $serviced->name = $service;
            $serviced->save();
        }
    }
}
