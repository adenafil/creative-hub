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
        $categories = [
          [
              'name' => 'ebook'
          ],
          [
              'name' => 'font'
          ],
          [
              'name' => 'icon'
          ],
          [
              'name' => 'template'
          ],
          [
              'name' => 'ui kit'
          ]
        ];

        Category::query()->insert($categories);
    }
}
