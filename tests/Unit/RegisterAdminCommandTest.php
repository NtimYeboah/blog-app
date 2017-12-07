<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use App\Traits\ReflectionTrait;
use App\Console\Commands\RegisterAdminCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterAdminCommandTest extends TestCase
{
    use ReflectionTrait, RefreshDatabase;

    private $registerAdminCommand;

    public function setUp()
    {
        parent::setUp();
        
        $user = factory(User::class)->create();

        $this->registerAdminCommand = new RegisterAdminCommand($user);
    }

    public function testPasswordOfRequiredLength()
    {
        $password = 'thispassword';

        $requiredLength = $this->invokeMethod(
            $this->registerAdminCommand,
            'isRequiredLength',
            [$password]
        );

        $this->assertTrue($requiredLength);
    }

    public function testPasswordOfNotRequiredLength()
    {
        $password = 'pass';
        
        $notRequiredLength = $this->invokeMethod(
            $this->registerAdminCommand,
            'isRequiredLength',
            [$password]
        );

        $this->assertFalse($notRequiredLength);
    }

    public function testMatchedPasswords()
    {
        $password = 'thispassword';
        $confirmPassword = 'thispassword';

        $matched = $this->invokeMethod(
            $this->registerAdminCommand,
            'isMatch',
            [$password, $confirmPassword]
        );

        $this->assertTrue($matched);
    }

    public function testUnmatchedPasswords()
    {
        $password = 'thispassword';
        $confirmPassword = 'thispassword123';

        $matched = $this->invokeMethod(
            $this->registerAdminCommand,
            'isMatch',
            [$password, $confirmPassword]
        );

        $this->assertFalse($matched);
    }
}
