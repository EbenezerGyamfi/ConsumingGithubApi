<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArrayElementTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_check_if_users_array_contains_ebenezer(): void
    {
       $users = ['Stan', 'ebenezer'];

       $this->assertContains('ebenezer', $users,);

    }
}
