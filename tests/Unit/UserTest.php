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
            'is_admin' => 1,
        ]);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($user->isAppOwner());
    }

    public function testIsAppOwner()
    {
        $user = factory(User::class)->create([
            'is_app_owner' => 1,
        ]);

        $this->assertTrue($user->isAppOwner());
        $this->assertFalse($user->isAdmin());
    }

    public function testCanCreateAppOwner()
    {
        $details = factory(User::class)->make()->toArray();

        $user = app(User::class)->create($details);
        
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(true, $user->isAppOwner());
        $this->assertEquals(true, $user->isAdmin());
    }

    public function testCanCreateAdmin()
    {
        factory(User::class)->create([
            'is_app_owner' => 1,
            'is_admin' => 1,
        ]);
        $details = factory(User::class)->make([
            'is_admin' => 1,
        ])->toArray();

        $user = app(User::class)->create($details);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(true, $user->isAdmin());
        $this->assertEquals(false, $user->isAppOwner());
    }

    public function testAppOwnerExists()
    {
        factory(User::class)->create([
            'is_app_owner' => 1,
            'is_admin' => 1,
        ]);

        $user = app(User::class)->appOwnerExists();

        $this->assertInstanceOf(User::class, $user);
        $this->assertTrue($user->isAppOwner());
    }

    public function testAppOwnerDoesNotExist()
    {
        factory(User::class)->create();

        $user = app(User::class)->appOwnerExists();

        $this->assertNull($user);
    }

    public function testCanGetFullName()
    {
        factory(User::class)->create([
            'first_name' => 'Adwoa',
            'last_name' => 'Korkor',
        ]);

        $user = User::first();

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($user->getFullName(), 'Adwoa Korkor');
    }
}
