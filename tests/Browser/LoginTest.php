<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCanLogin()
    {
        $user = factory(User::class)->create([
            'first_name' => 'Riyad',
            'last_name' => 'Mahrez',
            'email' => 'riyad.mahrez@mail.com',
            'password' => 'secret'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/admin/login')
                    ->assertSee('NTIM YEBOAH')
                    ->type('email', $user->email)
                    ->type('password', $user->password)
                    ->press('Log in')
                    ->assertPathIs('/')
                    ->assertSee('POSTS')
                    ->assertSee('SLIDES')
                    ->assertSee('DRAFTS');
        });
    }
}
