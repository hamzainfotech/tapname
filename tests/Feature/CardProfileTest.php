<?php

namespace Tests\Feature;

use App\Models\NfcCard;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CardProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_renders_for_valid_code(): void
    {
        $user = User::factory()->create();
        $card = NfcCard::create([
            'user_id' => $user->id,
            'code' => 'a1b2c3',
            'label' => 'Test Card',
            'is_active' => true,
        ]);

        $response = $this->get('http://tap.name/a1b2c3');

        $response->assertStatus(200);
    }

    public function test_profile_page_404_for_unknown_code(): void
    {
        $response = $this->get('http://tap.name/zzzzzz');

        $response->assertStatus(404);
    }

    public function test_dashboard_requires_auth(): void
    {
        $response = $this->get('http://account.tap.name/');

        $response->assertRedirect('/login');
    }
}