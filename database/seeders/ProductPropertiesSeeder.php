<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_properties')->insert([
            [
                'product_id' => 1,
                'property_id' => 1,
                'value' => '50x20x30'
            ]
        ]);
    }
}
