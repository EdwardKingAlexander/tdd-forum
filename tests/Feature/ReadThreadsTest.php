<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadsThreadsTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->thread = Thread::factory()->create();
    }
  

    /**
     * 
     * @ test
     * if users can browse all threads
     */
    public function test_a_user_can_browse_threads()
    {
        $this->get('/threads')
        ->assertSee($this->thread->title);
    }


    /**
     * 
     * @ test
     * if users can browse individual threads
     */

    public function test_a_user_can_read_a_single_thread()
    {
        $this->get('/threads/'. $this->thread->id)
        ->assertSee($this->thread->title);

    }

    /**
     * 
     * @test
     * users can read replies associated with the thread
     */

     public function test_a_user_can_read_replies_that_are_associated_with_a_thread()
     {
        $reply = Reply::factory()->create(['thread_id' => $this->thread->id]);
        $this->get('/threads/'. $this->thread->id)
        ->assertSee($reply->body);

     }
}
