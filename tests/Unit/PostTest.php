<?php

namespace Tests\Unit;

use App\Post;
use App\Draft;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_publish_post()
    {
        $draft = factory(Draft::class)->create();

        $post = app(Post::class)->add($draft);

        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals(str_slug($draft->title), $post->slug);
        $this->assertEquals($draft->id, $post->draft_id);
    }
}
