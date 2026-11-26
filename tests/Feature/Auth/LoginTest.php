<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_no_login_user(): void
    {
        $this->get(route('login'))->assertOk();
    }

    public function test_turor_when_valid_credentials(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('authenticate'), ['email' => $user->email, 'password' => 'password']);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_error_message(): void
    {
        $user = User::factory()->create();

        $response = $this->from(route('login'))->post(route('authenticate'), ['email' => $user->email, 'password' => 'wrong-password']);

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error', 'E-mail ou senha inválidos.');
        $this->assertGuest();
    }

    public function test_tutor_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}