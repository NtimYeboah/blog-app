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
}
