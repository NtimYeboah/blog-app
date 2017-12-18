<?php

namespace Tests\Unit;

use App\Posts;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_can_publish_post()
    {
        $draft = factory(Drafts::class)->create();

        $post = app(Posts::class)->add($draft);

        $this->assertInstanceOf(Posts::class, $post);
        $this->assertEquals(str_slug($draft->title), $post->slug);
        $this->assertEquals($draft->id, $post->draft_id);
    }
}
