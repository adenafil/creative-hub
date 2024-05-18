<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    public function testDashboardController()
    {
        $this->seed([UserSeeder::class]);

        $this->post('/home')->assertSeeText('hasanhusain', false);
    }
}
