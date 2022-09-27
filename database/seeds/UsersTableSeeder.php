<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_info = [
            [
                'born_date' => '1996-05-26',
                'email' => 'm96francesco@gmail.com',
                'name' => 'Francesco',
                'password' => 'Admin1234',
                'surname' => 'Marra',
            ],
            [
                'born_date' => '1999-08-04',
                'email' => 'j.nardelli@virgilio.it',
                'name' => 'Jacopo',
                'password' => 'Admin1234',
                'surname' => 'Nardelli',
            ],   [
                'born_date' => '1983-11-16',
                'email' => 'andrea.mangiapia@gmail.com',
                'name' => 'Andrea',
                'password' => 'Admin1234',
                'surname' => 'Mangiapia',
            ],   [
                'born_date' => '1998-09-02',
                'email' => 'lorenzo-veropalumbo@outlook.it',
                'name' => 'Lorenzo',
                'password' => 'Admin1234',
                'surname' => 'VeroPalumbo',
            ],   [
                'born_date' => '1994-09-06',
                'email' => 'angelo.dalicandro1@gmail.com',
                'name' => 'Angelo',
                'password' => 'Admin1234',
                'surname' => 'D\'Alicandro',
            ],
        ];

        foreach($users_info as $user_info) {
            $new_user_info = new User();
            $new_user_info->password = Hash::make($user_info['password']);
            $new_user_info->born_date = $user_info['born_date'];
            $new_user_info->email = $user_info['email'];
            $new_user_info->name = $user_info['name'];
            $new_user_info->surname = $user_info['surname'];
            $new_user_info->save();
        }
    }
}
