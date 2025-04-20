<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'state_id' => '1',
            'item_name' => '腕時計',
            'text' => 'スタイリッシュなデザインのメンズ腕時計',
            'price' => '15000',
            'item_image' => 'Clock.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '2',
            'state_id' => '2',
            'item_name' => 'HDD',
            'text' => '高速で信頼性の高いハードディスク',
            'price' => '5000',
            'item_image' => 'HDD.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '3',
            'state_id' => '3',
            'item_name' => '玉ねぎ3束',
            'text' => '新鮮な玉ねぎ3束のセット',
            'price' => '300',
            'item_image' => 'd.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '4',
            'state_id' => '4',
            'item_name' => '革靴',
            'text' => 'クラシックなデザインの革靴',
            'price' => '4000',
            'item_image' => 'Shoes.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '5',
            'state_id' => '1',
            'item_name' => 'ノートPC',
            'text' => '高性能なノートパソコン',
            'price' => '45000',
            'item_image' => 'Laptop.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '6',
            'state_id' => '2',
            'item_name' => 'マイク',
            'text' => '高音質のレコーディング用マイク',
            'price' => '8000',
            'item_image' => 'Mic.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '7',
            'state_id' => '3',
            'item_name' => 'ショルダーバッグ',
            'text' => 'おしゃれなショルダーバッグ',
            'price' => '3500',
            'item_image' => 'bag.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '8',
            'state_id' => '4',
            'item_name' => 'タンブラー',
            'text' => '使いやすいタンブラー',
            'price' => '500',
            'item_image' => 'Tumbler.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '9',
            'state_id' => '1',
            'item_name' => 'コーヒーミル',
            'text' => '手動のコーヒーミル',
            'price' => '4000',
            'item_image' => 'CoffeeGrinder.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => '10',
            'state_id' => '2',
            'item_name' => 'メイクセット',
            'text' => '便利なメイクアップセット',
            'price' => '2500',
            'item_image' => 'makeup.jpg'
        ];
        DB::table('items')->insert($param);
    }
}
