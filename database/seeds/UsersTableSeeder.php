<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
 				
 				'name'=>'Admin',
 				'password'=>bcrypt('admin'),
 				'email'=>'admin@gmail.com',
 				'admin'=>1
        ]);
    }
}
