<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        // Fake Topics
        $faker = Faker::create();

        $topics = DB::table('topics')->get();

        foreach ($topics as $topic) {

        	// 12 Posts Per Topic
        	foreach (range(1,12) as $index) {

        		// For the first post on a topic, we want the user is the same  
        		// as the creator of the topic
        		if ($index == 1) {
        			$user_id = $topic->user_id;
        			$content = $topic->title . ' '
        			         . $faker->sentence($nbWords = 10, $variableNbWords = true);
        		} else {
        			$user_id = mt_rand(1,100);
        			$content = $faker->sentence($nbWords = 10, $variableNbWords = true);
        		}
        		
        		DB::table('posts')->insert([
		        	'user_id'    => $user_id, 
		        	'topic_id'   => $topic->id, 
		        	'content'    => $content, 
		        	'created_at' => new DateTime, 
		        	'updated_at' => new DateTime,
		        ]);
            
        	}
        	
        }

    }
}
