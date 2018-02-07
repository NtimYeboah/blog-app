<?php

namespace Tests\Unit;

use App\User;
use App\Slide;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SlideTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
    }

    public function test_slide_is_published()
    {
        $slide = factory(Slide::class)->create([
            'is_published' => 1,
        ]);

        $this->assertTrue($slide->isPublished());
    }

    public function test_relationship_with_user()
    {
        $user = factory(User::class)->create();
        $slide = factory(Slide::class)->create([
            'user_id' => $user->id,
        ]);

        $this->assertEquals($user->id, $slide->user->id);
    }
}
