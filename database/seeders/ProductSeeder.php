<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Echo Buds',
                'price' => 119.99,
                'type' => 2
            ],
            [
                'name' => 'Vector Robot by Anki',
                'price' => 389.00,
                'type' => 2
            ],
            [
                'name' => 'Design Patterns: Elements of Reusable Object-Oriented Software',
                'price' => 31.50,
                'type' => 1
            ]
        ]);
    }
}
