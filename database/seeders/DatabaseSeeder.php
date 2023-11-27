<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserData::factory()->create([
                'avatar' => 'https://i.pravatar.cc/300',
                'dni' => '12345678',
            ]);

        // create a admin user
       

        \App\Models\UserData::factory(30)->create();
        \App\Models\Lawyer::factory(20)->create();
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'user_data_id' => 1,
            'lawyer_id' => null,
            'role' => 'admin',
        ]);
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
