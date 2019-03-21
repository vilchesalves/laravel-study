<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    public function testDashboardURLNoUser()
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect();
    }

    public function testDashboardURLWithUser()
    {
        $admin = factory(User::class)->states('admin')->make();
        $response = $this
            ->actingAs($admin)
            ->get(route('dashboard'));
        $response->assertOk();
    }
}
