<?php

namespace Tests\Unit;

use App\Models\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{

    use DatabaseMigrations;
    /**
     *
     * @test
     */
    public function test_a_thread_has_replies()
    {
        $thread = Thread::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $thread->replies);
    }


    /**
     * 
     * @test
     */

     public function test_a_thread_has_a_creator()
     {
         $thread = Thread::factory()->create();

         $this->assertInstanceOf('App\Models\User', $thread->creator);
     }
}
