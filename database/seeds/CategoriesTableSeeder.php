<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        Category::create(['title'       => 'Science', 
                          'description' => 'Posts about Science']);

        Category::create(['title'       => 'Computer', 
                          'description' => 'Posts about Computer']);

        Category::create(['title'       => 'Business', 
                          'description' => 'Posts about Business']);

        Category::create(['title'       => 'Innovation', 
                          'description' => 'Posts about Innovation']);

        Category::create(['title'       => 'Finance', 
                          'description' => 'Posts about Finance']);

        Category::create(['title'       => 'Other', 
                          'description' => 'Posts about other subjects']);

    }
}
