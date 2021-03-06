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
        $this->withExceptionHandling()
        ->post('/threads/mo-powa-baby/1/replies', [])
        ->assertRedirect('/login');
    }




    /***
     * @test
     * ***/
    public function test_an_authenticated_user_may_participate_in_forum_threads()
    {
        // given we have an authenticated user... be() authenticates the user
        $this->signIn();

        // and an existing thread
        $thread = create(Thread::class);

        // when the user adds a reply to the thread
        $reply = make(Reply::class);

        $this->post($thread->path().'/replies', $reply->toArray());

        // Their reply should be visible to the page
        $this->get($thread->path())
        ->assertSee($reply->body);
    }

    /**
     * @test
     */
    public function test_a_reply_requires_a_body()
    {
        $this->withExceptionHandling()->signIn();

        $thread = create(Thread::class);

        $reply = make(Reply::class, ['body' => null]);

        $this->post($thread->path(). '/replies', $reply->toArray())
        ->assertSessionHasErrors('body');



    }
}
