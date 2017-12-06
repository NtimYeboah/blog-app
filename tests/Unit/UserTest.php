<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testIsAdmin()
    {
        $user = factory(User::class)->create([
            'is_admin' => 1
        ]);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($user->isAppOwner());
    }

    public function testIsAppOwner()
    {
        $user = factory(User::class)->create([
            'is_app_owner' => 1
        ]);

        $this->assertTrue($user->isAppOwner());
        $this->assertFalse($user->isAdmin());
    }
}
