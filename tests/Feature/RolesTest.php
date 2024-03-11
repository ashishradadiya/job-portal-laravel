<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;

class RolesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_role_create(): void
    {
        // Create roles
        $role = Role::factory()->create();
        $this->assertInstanceOf(Role::class, $role);
        // Assertions
        $this->assertNotNull($role);
        $this->assertEquals(1, Role::count());
    }

}
