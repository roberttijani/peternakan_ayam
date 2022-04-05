<?php

use Illuminate\Database\Seeder;
use App\Model\Pelanggan;
use Faker\Factory;

class PelangganSeeder extends Seeder
{
    
    public function run()
    {
        Pelanggan::truncate();
        $faker=Factory::create('id_ID');

        $this->command->getOutput()->progressStart(300);
        for ($i=0; $i <300 ; $i++) { 
        	Pelanggan::create([
        		'nama'=>$faker->name,
        		'no_hp'=>$faker->phoneNumber,
        		'alamat'=>$faker->address,
        	]);
        $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
