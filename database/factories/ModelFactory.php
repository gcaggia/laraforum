<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    
    $nbImages    = count(File::files('./public/images/user_images'));
    $FolderImage = '/images/user_images/';
    $gender      = rand(1,100)%2;
    $firstname   = $gender == 0 ? lcfirst($faker->firstNameMale) 
                                : lcfirst($faker->firstNameFemale);

    $lastname    = lcfirst($faker->unique()->lastName);
    $provider    = rand(1,100)%2 == 0 ? $faker->domainName 
                                      : $faker->freeEmailDomain;

    $email       = $firstname . '.' . $lastname . '@' . $provider;

    $skills      = implode('|', $faker->words($nb = rand(5, 10), $asText = false));

    return [
        'firstname'      => $firstname,
        'lastname'       => $lastname,
        'username'       => $firstname . '.' . $lastname,
        'email'          => $email,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'country'        => $faker->country,
        'skills'         => $skills,        
        'biography'      => $faker->sentences(rand(10,40), $asText = true),
        'profil_image'   => $FolderImage 
                             . 'image' 
                             . mt_rand(1, $nbImages)
                             . '.jpg',
    ];
});
