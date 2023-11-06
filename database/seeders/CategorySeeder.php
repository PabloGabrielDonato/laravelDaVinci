<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesNames = [
            'laboral', 
            'jubilacion', 
            'pension', 
            'judicial', 
        ];

        forEach($categoriesNames as $categoryName) {
            Category::factory()->create([
                'name' => $categoryName
            ]);
        }
    }
}
