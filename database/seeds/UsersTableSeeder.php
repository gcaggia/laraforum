<?php

use Illuminate\Database\Seeder;
use LaraForum\User;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        // Real user : me
        User::create(['name'    => env('NAME_PERSO'), 
                      'email'   => env('MAIL_PERSO'), 
                      'password'=> bcrypt(env('NAME_PERSO'))]);

        // Fake users 
        $faker = Faker::create();

        $nbImages = count(File::files('./public/images/user_images'));
        $FolderImage = '/images/user_images/';

        foreach (range(1,100) as $index) {
            User::create(['name'         => $faker->name, 
                          'email'        => $faker->email, 
                          'password'     => bcrypt('secret'),
                          'profil_image' => $FolderImage 
                                              . 'image' 
                                              . mt_rand(1, $nbImages)
                                              . '.jpg'
                         ]);
        }

    }
}
