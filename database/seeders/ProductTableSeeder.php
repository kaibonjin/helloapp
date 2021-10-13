<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name'=> 'ball',
        ];
        DB::table('product')->insert($param);

        $param = [
            'name'=> 'badminton racket'
        ];
        DB::table('product')->insert($param);

        $param = [
            'name'=> 'computer'
        ];
        DB::table('product')->insert($param);
    }
}
