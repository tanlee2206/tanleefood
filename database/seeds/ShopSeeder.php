<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop')->insert([
            'name'=>'Quán Nguyễn Vũ',
            'description' => 'You may use the once method to log a user into the application for a single request. No sessions or cookies will be utilized, which means this method may be',
            'user_id'=>'3',
            'address_id'=>'1',
            'slug'=>'quan-nguyen-vu',
            'img'=>'asset/customer/images/product-1.jpg',
            ]);
         DB::table('shop')->insert([
            'name'=>'Quán Cơm Bà Bãy',
            'description' => 'You may use the once method to log a user into the application for a single request. No sessions or cookies will be utilized, which means this method may be',
            'user_id'=>'4',
            'address_id'=>'2',
            'slug'=>'quan-com-ba-bay',
            'img'=>'asset/customer/images/product-2.jpg',
            ]);
    }
}
