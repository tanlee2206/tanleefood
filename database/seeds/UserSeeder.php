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
            'address_id'=> '2',
            'groupuser_id' => '1',
            'email' => 'tan@gmail.com',
            'password' => Hash::make('123'),

        ]);
        DB::table('users')->insert([
            'first_name' =>'admin',
            'last_name' =>'1',
            'login_name' =>'admin',
            'address_id'=> '3',
            'groupuser_id' => '1',
            'permission' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),


        ]);
        DB::table('users')->insert([
            'first_name' =>'shop',
            'last_name' =>'2',
            'login_name' =>'shop',
            'address_id'=> '4',
            'groupuser_id' => '2',
            'permission' => '2',
            'email' => 'shop@gmail.com',
            'password' => Hash::make('123'),


        ]);
        DB::table('users')->insert([
            'first_name' =>'shop2',
            'last_name' =>'shop2',
            'login_name' =>'shop2',
            'address_id'=> '6',
            'groupuser_id' => '2',
            'permission' => '2',
            'email' => 'shop2@gmail.com',
            'password' => Hash::make('123'),


        ]);
        DB::table('users')->insert([
            'first_name' =>'customer',
            'last_name' =>'3',
            'login_name' =>'customer',
            'groupuser_id' => '3',
            'address_id'=> '5',
            'permission' => '3',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123'),

        ]);


    }
}
