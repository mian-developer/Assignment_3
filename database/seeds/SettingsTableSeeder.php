<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               App\Setting::create([
 				
 				'name'=>'MobileShop',
        ]);
    }
}
