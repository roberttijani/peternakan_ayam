<?php

use Illuminate\Database\Seeder;
use App\Model\Suplier;
use Faker\Factory;

class SuplierSeeder extends Seeder
{
    
    public function run()
    {
    	Suplier::truncate();
    	$faker=Factory::create('id_ID');

    	$this->command->getOutput()->progressStart(300);
    	for ($i=1; $i <=300 ; $i++) { 
    	    	Suplier::create([
    	    		'nama'=>$faker->name,
    	    		'no_hp'=>$faker->phoneNumber,
    	    		'alamat'=>$faker->address,
    	    	]);
    	$this->command->getOutput()->progressAdvance();
    	    } 
    	$this->command->getOutput()->progressFinish();   
    }
}
