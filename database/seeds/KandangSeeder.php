<?php

use Illuminate\Database\Seeder;
use App\Model\Kandang;
use Faker\Factory;

class KandangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kandang::truncate();
        $faker=Factory::create('id_ID');

        $this->command->getOutput()->progressStart(5);
        for ($i=0; $i <=5 ; $i++) { 
        	Kandang::create([
        		'nama'=>$faker->safeColorName,
        		'kode'=>$faker->postcode,
                'status'=>'kosong',
        	]);
        $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
