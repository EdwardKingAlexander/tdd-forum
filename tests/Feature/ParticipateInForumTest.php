<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;


    /**
     * @test
     */
    public function test_an_unauthenticated_user_may_not_add_replies()
    {
        $this->expectException(AuthenticationException::class);
        $this->withoutExceptionHandling();

        $this->post('/threads/1/replies', []);
    }




    /***
     * @test
     * ***/
    public function test_an_authenticated_user_may_participate_in_forum_threads()
    {
        // given we have an authenticated user... be() authenticates the user
        $this->be($user = User::factory()->create());

        // and an existing thread
        $thread = Thread::factory()->create();

        // when the user adds a reply to the thread
        $reply = Reply::factory()->make();

        $this->post($thread->path().'/replies', $reply->toArray());

        // Their reply should be visible to the page
        $this->get($thread->path())
        ->assertSee($reply->body);
    }
}
