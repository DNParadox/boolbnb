<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;

class SponsorshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'name' => 'bronze',
                'hour' => 24,
                'price' => 2.99,
            ],
            [
                'name' => 'gold',
                'hour' => 72,
                'price' => 5.99,
            ],
            [
                'name' => 'platinum',
                'hour' => 144,
                'price' => 9.99,
            ],
        ];

        foreach($sponsorships as  $sponsorship_info) {
            $sponsorship = new Sponsorship();
            $sponsorship->name = $sponsorship_info['name'];
            $sponsorship->hour = $sponsorship_info['hour'];
            $sponsorship->price = $sponsorship_info['price'];
            $sponsorship->save();
        }
    }
}
