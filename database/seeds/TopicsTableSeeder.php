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

                $title = $category->title 
                         . ' on ' 
                         . $faker->unique()
                                 ->sentence($nbWords = 4, 
                                            $variableNbWords = true);

                DB::table('topics')->insert([
                    'user_id'     => mt_rand(1,100), 
                    'category_id' => $index,
                    'topic_slug'  => str_slug($title),
                    'title'       => $title, 
                    'created_at'  => new DateTime, 
                    'updated_at'  => new DateTime,
                ]);
            
            }
            
        }
    }
}
