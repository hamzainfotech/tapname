<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_page_renders(): void
    {
        $response = $this->get('http://admin.tap.name/login');

        $response->assertStatus(200);
    }

    public function test_admin_can_log_in_and_view_dashboard(): void
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('http://admin.tap.name/login', [
            'email' => 'admin@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->get('http://admin.tap.name/')->assertStatus(200);
    }

    public function test_dashboard_requires_admin_auth(): void
    {
        $response = $this->get('http://admin.tap.name/');

        $response->assertRedirect(route('admin.login'));
    }
}