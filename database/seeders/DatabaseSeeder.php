<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('\Database\Seeders\CategoryTableSeeder');
        $this->command->info('Category table seeded');
        // \App\Models\User::factory(10)->create();
    }
}
