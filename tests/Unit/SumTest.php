<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_that_sum_of_two_plus_two_is_four(): void
    {
        $sum = 2 + 2;

        $this->assertEquals(4, $sum);
    }

    
}
