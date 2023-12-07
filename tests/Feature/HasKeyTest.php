<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HasKeyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_check_array_has_key(): void
    {

        $array = [
            'firstName'  => 'Ebenezer',
            'secondName' => 'Gyamfi',
            'otherName' => 'Khaled'
        ];


        $this->assertArrayHasKey('otherName', $array);
    }
}
