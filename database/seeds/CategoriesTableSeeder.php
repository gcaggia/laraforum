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
                          'slug'        => 'science',
                          'description' => 'Posts about Science']);

        Category::create(['title'       => 'Computer', 
                          'slug'        => 'computer',
                          'description' => 'Posts about Computer']);

        Category::create(['title'       => 'Business', 
                          'slug'        => 'business',
                          'description' => 'Posts about Business']);

        Category::create(['title'       => 'Innovation', 
                          'slug'        => 'innovation',
                          'description' => 'Posts about Innovation']);

        Category::create(['title'       => 'Finance', 
                          'slug'        => 'finance',
                          'description' => 'Posts about Finance']);

        Category::create(['title'       => 'Other', 
                          'slug'        => 'other',
                          'description' => 'Posts about other subjects']);

    }
}
