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
        factory(LaraForum\User::class, 100)->create();

    }
}
