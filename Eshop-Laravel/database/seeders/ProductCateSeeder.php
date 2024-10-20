<?php

namespace Database\Seeders;

use app\Models\ProductCate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = date('2024-10-17 00:00:00');
        DB::table('product_cates')->insert([
            [
                'name' => 'Laptop',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'TV',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Tủ lạnh',
                'created_at' => $date,
                'updated_at' => $date,
            ]
        ]);
    }
}
