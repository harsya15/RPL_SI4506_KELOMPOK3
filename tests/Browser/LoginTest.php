<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Log in')
            ->clickLink('Log in')
            ->assertPathIs('/login')
            ->type('email', 'user@g.n')
            ->type('password', 'password')
            ->press('Login');
        });
    }
}
