<?php

namespace Tests\Unit;

use App\Draft;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DraftTest extends TestCase
{
    use RefreshDatabase;

    public function test_draft_is_published()
    {
        $draft = factory(Draft::class)->create([
            'is_published' => 1,
        ]);

        $this->assertTrue($draft->isPublished());
    }

    public function test_can_publish_draft()
    {
        $draft = factory(Draft::class)->create();

        $publishedDraft = $draft->publish();

        $this->assertTrue($publishedDraft);
    }

    public function test_unpublished_scope()
    {
        $publishedDrafts = factory(Draft::class, 10)->create([
            'is_published' => 1,
        ]);

        $unpublishedDrafts = factory(Draft::class, 8)->create();

        $this->assertCount(18, Draft::all());
        $this->assertCount(8, Draft::unpublished()->get());
    }

    public function test_published_scope()
    {
        $publishedDrafts = factory(Draft::class, 10)->create([
            'is_published' => 1,
        ]);

        $unpublishedDrafts = factory(Draft::class, 8)->create();

        $this->assertCount(18, Draft::all());
        $this->assertCount(10, Draft::published()->get());
    }
}
