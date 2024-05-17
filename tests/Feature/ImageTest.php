<?php

namespace Tests\Feature;

use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImageTest extends TestCase
{
    public function testInsertImage()
    {
        $image = new Image();
        $image->location = 'www.google.com/uisi.png';
        $result = $image->save();

        self::assertTrue($result);
    }
}
