<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('topics')->truncate();

        // Fake Topics
        $faker = Faker::create();

        $nbCategories = DB::table('categories')->count();

        foreach (range(1, $nbCategories) as $index) {

        	$category = DB::table('categories')->where('id', $index)->first();

        	foreach (range(1,6) as $subIndex) {

        		DB::table('topics')->insert([
		        	'user_id'     => mt_rand(1,100), 
		        	'category_id' => $index, 
		        	'title' => $category->title . ' on ' 
		        	   . $faker->sentence($nbWords = 4, $variableNbWords = true), 
		        	'created_at'  => new DateTime, 
		        	'updated_at'  => new DateTime,
		        ]);
            
        	}
            
        }
    }
}
