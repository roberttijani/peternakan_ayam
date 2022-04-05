<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use Faker\Factory;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        User::truncate();
        $faker=Factory::create('id_ID');

        User::create([
        	'name'=>'admin',
        	'email'=>'admin@admin',
        	'no_hp'=>$faker->phoneNumber,
        	'password'=>bcrypt('admin'),
        	'alamat'=>$faker->address,
        	'role'=>'admin',
        ]);

        User::create([
        	'name'=>'petugas',
        	'email'=>'petugas@petugas',
        	'no_hp'=>$faker->phoneNumber,
        	'password'=>bcrypt('petugas'),
        	'alamat'=>$faker->address,
        	'role'=>'petugas',
        ]);

        User::create([
        	'name'=>'kasir',
        	'email'=>'kasir@kasir',
        	'no_hp'=>$faker->phoneNumber,
        	'password'=>bcrypt('kasir'),
        	'alamat'=>$faker->address,
        	'role'=>'kasir',
        ]);
    }
}
