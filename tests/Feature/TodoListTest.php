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
    public function test_get_todos(): void
    {

        
       $todo =  TodoList::factory()->create();


        $response = $this->getJson(route('todo'))->json();



        $this->assertSame($todo->name, $response['list'][0]['name']);
    }

    public function test_get_todo(){


        $todo_list = TodoList::factory()->create();

        $response = $this->getJson(route('single.todo', $todo_list->id))->json();


        $this->assertSame($todo_list->name, $response['todo']['name']);

    }
}
