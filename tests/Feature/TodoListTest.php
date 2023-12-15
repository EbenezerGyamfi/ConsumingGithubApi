<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_get_todo(): void
    {

        
        TodoList::create([
            'name' => 'test todo'
        ]);

        $response = $this->getJson(route('todo'));

        $this->assertEquals(1, count($response->json()));
    }
}
