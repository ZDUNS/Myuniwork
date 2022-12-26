<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::truncate();
        Vehicle::create(array('id' => 1, 'name' => 'Lidojumi'));
        Vehicle::create(array('id' => 2, 'name' => 'Autobusu ceļojumi'));
        Vehicle::create(array('id' => 3, 'name' => 'Pārgājieni'));
        Vehicle::create(array('id' => 4, 'name' => 'Kruīzi'));
    }
}
