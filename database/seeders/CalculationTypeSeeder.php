<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calculation_types')->insert([
            [
                'name' => 'with_tax',
            ],
            [
                'name' => 'without_tax',
            ]
        ]);
    }
}
