<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificate;
use Faker\Factory as faker;

class CertificateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,3) as $index){
	        Certificate::create([
			'certificate_name' => $faker->word(),
	        'certificate_status' => 1 ]);
	    }
    }
}
