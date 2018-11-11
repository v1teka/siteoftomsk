<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('point_types')->insert([
            'title' => 'Другое',
            'isPositive' => true,
            'iconType' => 'ok',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Другая проблема',
            'isPositive' => false,
            'iconType' => 'remove',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Благоустройство',
            'isPositive' => true,
            'iconType' => 'park',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Искусство',
            'isPositive' => true,
            'iconType' => 'theater-icon',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Спорт',
            'isPositive' => true,
            'iconType' => 'volleyball',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Достопримечательность',
            'isPositive' => true,
            'iconType' => 'star',
        ]);

        DB::table('point_types')->insert([
            'title' => 'Брошенный автомобиль',
            'isPositive' => false,
            'iconType' => 'car',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Незаконное строительство',
            'isPositive' => false,
            'iconType' => 'brick-wall',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Свалка мусора',
            'isPositive' => false,
            'iconType' => 'bin',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Незаконное предпринимательство',
            'isPositive' => false,
            'iconType' => 'ruble',
        ]);
        DB::table('point_types')->insert([
            'title' => 'Яма на дороге',
            'isPositive' => false,
            'iconType' => 'car-wheel-defect',
        ]);
    }
}
