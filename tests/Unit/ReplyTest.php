<?php

namespace Tests\Unit;

use App\Models\Reply;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function test_a_reply_has_an_owner()
    {
        $reply = Reply::factory()->create();
        $this->assertInstanceOf('App\Models\User', $reply->owner);
    }
}
