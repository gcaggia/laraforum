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
    }
}
