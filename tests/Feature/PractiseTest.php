<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PractiseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_helloWorld(): void
    {
        $greeting = "hello world";

        $this->assertEquals("hello world", $greeting);
    }
}
