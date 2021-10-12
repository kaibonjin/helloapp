<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name'=> 'taro',
            'mail'=> 'taro@yamada.jp',
            'age'=> 12,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name'=> 'kaisei',
            'mail'=> 'kaisei@kaisei.jp',
            'age'=> 34,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name'=> 'ria',
            'mail'=> 'ria@ria.jp',
            'age'=> 22,
        ];
        DB::table('people')->insert($param);

    }
}
