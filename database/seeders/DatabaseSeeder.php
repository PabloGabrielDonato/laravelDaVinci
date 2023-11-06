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

        \App\Models\UserData::factory(30)->create();
        \App\Models\Lawyer::factory(20)->create();
        \App\Models\User::factory(30)->create();
        \App\Models\Post::factory(100)->create();

        // ejecuto el seeder de categorias porque quiero crear categorias especificas
        $this->call([
            CategorySeeder::class,
        ]);


        $categoryCount = \App\Models\Category::count();

        // Populate the pivot table
        \App\Models\Post::all()->each(function ($post) use ($categoryCount) {
            $post->categories()->attach(
                \App\Models\Category::all()->random(rand(1, $categoryCount))->pluck('id')->toArray()
            );
        });


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
