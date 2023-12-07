<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


function link_to($url,$body){


    $url = url($url);
    
    return "<a href='{$url}'>{$body}/1</a>";
}
class AnchorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_generateAnchorTest(): void
    {
        $actual = link_to('dogs/1','Show Dog');

        $expected = "<a href='http://dogs/1'>Show Dog/1</a>";


        $this->assertEquals($expected, $actual);
    }
}
