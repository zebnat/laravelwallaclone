<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        Category::create(['name' => 'Hogar', 'description' => 'Productos para el hogar.']);
        Category::create(['name' => 'Motor', 'description' => 'Productos relacionados con vehículos.']);
        Category::create(['name' => 'Electrónica', 'description' => 'Productos relacionados con la electrónica.']);
        Category::create(['name' => 'Otros', 'description' => 'Productos que no encajan en otra categoría.']);
        // \App\Models\User::factory(10)->create();
    }
}
