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
            'first_name' =>'Tân',
            'last_name' =>'Huỳnh',
            'login_name' =>'tanlee',
            'groupuser_id' => '1',
            'email' => 'tan@gmail.com',
            'password' => Hash::make('123'),

        ]);
        DB::table('users')->insert([
            'first_name' =>'admin',
            'last_name' =>'1',
            'login_name' =>'admin',
            'groupuser_id' => '1',
            'permission' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),


        ]);
        DB::table('users')->insert([
            'first_name' =>'shop',
            'last_name' =>'2',
            'login_name' =>'shop',
            'address' => '3/2, phường xuân khánh, quận Ninh kiều Tp cân Thơ',
            'groupuser_id' => '2',
            'permission' => '2',
            'email' => 'shop@gmail.com',
            'password' => Hash::make('123'),


        ]);
        DB::table('users')->insert([
            'first_name' =>'customer',
            'last_name' =>'3',
            'login_name' =>'customer',
            'groupuser_id' => '3',
            'permission' => '3',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123'),

        ]);


    }
}
