<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Drafts;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DraftTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_draft_is_published()
    {
        $draft = factory(Drafts::class)->create([
            'is_published' => 1
        ]);

        $this->assertTrue($draft->isPublished());
    }
}
