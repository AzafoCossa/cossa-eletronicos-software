<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        $categories = [
            ['name' => 'Eletrônicos', 'parent_id' => null],
            ['name' => 'Eletrodomésticos', 'parent_id' => null],
            [
                'name' => 'Smartphones',
                'parent_id' => 1
            ],
            [
                'name' => 'Micro-ondas',
                'parent_id' => 2,
            ],
            [
                'name' => 'Fogões',
                'parent_id' => 2,
            ]
        ];

        Category::insert($categories);
    }
}
