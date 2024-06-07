<?php

namespace Tests\Feature;

use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testCategoryExist()
    {
        $this->seed(CategorySeeder::class);

        $categories = Category::query()->get();

        self::assertNotNull($categories);
        self::assertEquals($categories[0]->name, 'ebook');
        self::assertEquals($categories[1]->name, 'font');
        self::assertEquals($categories[2]->name, 'icon');
        self::assertEquals($categories[3]->name, 'template');
        self::assertEquals($categories[4]->name, 'ui kit');
    }
}
