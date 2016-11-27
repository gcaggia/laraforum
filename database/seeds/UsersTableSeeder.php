<?php

use Illuminate\Database\Seeder;
use App\User;

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

        User::create(['name'    => env('NAME_PERSO'), 
        		      'email'   => env('MAIL_PERSO'), 
        		      'password'=> bcrypt(env('NAME_PERSO'))]);

    }
}
