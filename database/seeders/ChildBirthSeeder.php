<?php

namespace Database\Seeders;

use Database\Factories\ChildBirthFactory;
use Illuminate\Database\Seeder;

class ChildBirthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChildBirthFactory::factory()->count(5)->create();
    }
}
