<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Tân',
            'login_name' =>'tanlee',
            'groupuser_id' => '1',
            'email' => 'tan@gmail.com',
            'password' => Hash::make('123'),

        ]);

    }
}
