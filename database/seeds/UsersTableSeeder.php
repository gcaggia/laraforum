<?php

use Illuminate\Database\Seeder;
use App\User;

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

        $faker = Faker::create();

        $skills = implode('|', $faker->words($nb = rand(5, 10), $asText = false));

        // Real user : me
        User::create(['firstname'    => env('FIRSTNAME_PERSO'),
                      'lastname'     => env('LASTNAME_PERSO'),
                      'username'     => env('FIRSTNAME_PERSO') 
                                        . '.' . env('LASTNAME_PERSO'),
                      'profil_image' => env('AVATAR_PERSO'),
                      'email'        => env('MAIL_PERSO'),

                      'password'     => bcrypt(env('FIRSTNAME_PERSO')),
                      'country'      => $faker->country,
                      'skills'       => $skills,        
                      'biography'    => $faker->sentences(rand(10,40), $asText = true),]);

        // Fake users 
        factory(App\User::class, 100)->create();

    }
}
