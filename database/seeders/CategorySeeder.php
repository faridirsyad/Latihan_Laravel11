<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(4)->create();

        Category::create([
            'name' => 'SIG',
            'slug' => 's_i_g',
            'color' => 'green'
        ]);

        Category::create([
            'name' => 'Web Dinamis',
            'slug' => 'W_d',
            'color' => 'blue'
        ]);

        Category::create([
            'name' => 'Data Mining',
            'slug' => 'datmin',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
            'color' => 'yellow'
        ]);
    }
}
