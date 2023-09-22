<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AgeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['age'=>'10代以下','sort'=>1],
            ['age'=>'20代','sort'=>2],
            ['age'=>'30代','sort'=>3],
            ['age'=>'40代','sort'=>4],
            ['age'=>'50代','sort'=>5],
            ['age'=>'60代以上','sort'=>6],
        ];
        DB::table('ages')->insert($data);
    }
}
