<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseTruncation;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_tutor_cannot_login_with_wrong_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', $this->user->email)
                ->type('password', 'wrong-password')
                ->press('Entrar')
                ->assertPathIs('/login')
                ->assertSee('E-mail ou senha inválidos.');
        });
    }

    public function test_tutor_login_and_see_dashboard(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', $this->user->email)
                ->type('password', 'password')
                ->press('Entrar')
                ->waitForLocation('/dashboard')
                ->assertPathIs('/dashboard');
        });
    }
}