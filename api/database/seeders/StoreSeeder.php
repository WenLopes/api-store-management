<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Store::factory(3)->create();
    }
}
