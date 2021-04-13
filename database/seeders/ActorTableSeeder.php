<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;
use Faker\Factory as faker;

class ActorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
	        $faker = Faker::create();
	        foreach(range(1,50) as $index){
	        Actor::create([
			'actor_fname' => $faker->firstName($gender = 'others'|'male'|'female'),
			'actor_lname' => $faker->lastName(),
			'actor_notes'=> $faker->realText($maxNbChars = 25, $indexSize = 2),
	        'actor_img' => '',
	        'actor_status' => 1 ]);
	    }
    }
}
