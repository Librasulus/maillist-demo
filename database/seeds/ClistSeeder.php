<?php

use App\Clist;
use Illuminate\Database\Seeder;

class ClistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Clist::create(['name' => 'Customers']);
      Clist::create(['name' => 'Suppliers']);
    }
}
