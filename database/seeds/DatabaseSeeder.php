<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'phone'=>01001001001,
            'gender'=>'Male',
            'date_of_birth'=>'1990/12/01',
            'national_id'=>23456789022113 ,
        ]);
    }
}
