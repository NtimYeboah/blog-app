<?php

namespace Tests\Unit;

use Tests\TestCase;

class SlideTest extends TestCase
{
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
