<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	

    	// Users Table
    	$this->call(UsersTableSeeder::class);
        $this->command->info('Users Table seeded.');

        // Categories Table
        $this->call(CategoriesTableSeeder::class);
        $this->command->info('Categories Table seeded.');

        // Posts Polls Table
        $this->call(PostsPoolsTableSeeder::class);
        $this->command->info('PostsPools Table seeded.');

        // Posts Table
        $this->call(PostsTableSeeder::class);
        $this->command->info('Posts Table seeded.');
    }
}
