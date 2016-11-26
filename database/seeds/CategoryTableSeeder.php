<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
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

        Category::create(['title'       => 'Economy', 
        	              'description' => 'Posts about Economy']);

        Category::create(['title'       => 'Other', 
        	              'description' => 'Posts about other subjects']);

    }
}
