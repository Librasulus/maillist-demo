<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'wide_services',
            'email' => 'wservices@yahoo.gr',
            'password' => bcrypt('w1d3_serv!ces')
        ]);
    }
}
