<?php

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
        // $this->call(UserSeeder::class);
        factory(App\Category::class, 3)->create();
        factory(App\Product::class, 100)->create();
        factory(App\User::class, 10)->create();
        factory(App\Review::class, 30)->create();
    }
}
