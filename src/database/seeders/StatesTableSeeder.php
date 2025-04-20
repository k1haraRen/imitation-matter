<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'state' => '良好'
        ];
        DB::table('states')->insert($param);

        $param = [
            'state' => '目立った傷や汚れなし'
        ];
        DB::table('states')->insert($param);

        $param = [
            'state' => 'やや傷や汚れあり'
        ];
        DB::table('states')->insert($param);

        $param = [
            'state' => '状態が悪い'
        ];
        DB::table('states')->insert($param);
    }
}
