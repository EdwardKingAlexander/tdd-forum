<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * 
     * @test
     */
    public function test_a_guest_may_not_create_threads()
    {
        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);
        $thread = create(Thread::class);
        $this->post('/threads', $thread->toArray());
    }



    /**
     * @test
     */
    public function test_an_authenticated_user_can_create_new_forum_thread()
    {

        $this->signIn();

        $thread = make(Thread::class);

        $response = $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
        ->assertSee($thread->title)
        ->assertSee($thread->body);
    }
}
