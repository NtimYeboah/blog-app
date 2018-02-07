<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class HomeTest extends DuskTestCase
{
    /**
     * Visit homepage.
     *
     * @return void
     */
    public function testCanVisitHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('NTIM YEBOAH')
                    ->assertSee('POSTS')
                    ->assertSee('SLIDES')
                    ->assertSee('ABOUT');
        });
    }
}
