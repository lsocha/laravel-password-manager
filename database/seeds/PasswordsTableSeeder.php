<?php

use Illuminate\Database\Seeder;

class PasswordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('passwords')->insert([
            'page' => 'facebook',
            'login' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'description' => 'Lorem ipsum',            
        ]);
    }
}
