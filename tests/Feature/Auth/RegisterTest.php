<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_show(): void
    {
        $this->get(route('register'))->assertOk();
    }

    // Cadastra usuario
    public function test_login_and_redirect(): void
    {
        $response = $this->post(route('register.store'), $this->form());

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', ['email' => 'ana@email.com']);
        $this->assertAuthenticated();
    }

    // Email repetido
    public function test_duplicated_email(): void
    {
        User::factory()->create(['email' => 'ana@email.com']);

        $response = $this->post(route('register.store'), $this->form());

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('users', 1);
        $this->assertGuest();
    }

    public function test_register(): void
    {
        $response = $this->post(route('register.store'), $this->form(['password_confirmation' => 'other123']));

        $response->assertSessionHasErrors('password');
        $this->assertDatabaseMissing('users', ['email' => 'ana@email.com']);
    }

    private function form(array $changes = []): array
    {
        return array_merge([
            'name' => 'Ana',
            'email' => 'ana@email.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ], $changes);
    }
}