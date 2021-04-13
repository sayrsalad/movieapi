<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use Faker\Factory as faker;


class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,5) as $index){
	        Genre::create([
			'genre_name' => $faker->word(),
	        'genre_status' => 1 ]);
	    }
    }
}
