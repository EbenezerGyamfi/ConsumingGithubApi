<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{

    use RefreshDatabase;

    private $todoList;

    public function setUp(): void
    {
        parent::setUp();
        $this->todoList = TodoList::factory()->create();
    }
    /**
     * A basic feature test example.
     */
    public function test_get_todos(): void
    {

        $response = $this->getJson(route('todo'))->json();



        $this->assertSame($this->todoList->name, $response['list'][0]['name']);
    }

    public function test_get_todo()
    {
        $response = $this->getJson(route('single.todo', $this->todoList->id))->json();


        $this->assertSame($this->todoList->name, $response['todo']['name']);
    }


    public function test_store_to_list_store()
    {



        $response = $this->postJson(route('todo.store', [
            'name' => $this->todoList->name
        ]))
            ->assertCreated()
            ->json();



        $this->assertSame($this->todoList->name, $response['0']['name']);
    }


    public function test_post_todo_with_name_should_send_a_bad_request_error()
    {

        $response =  $this->postJson(route('todo.store'));



        $response->assertStatus(500);
    }


    public function test_delete_todo()
    {

        $response = $this->deleteJson(route('todo.delete', $this->todoList->id));

        $response->assertNoContent();
    }

    public function test_edit_to_return_ok(){


        $response = $this->patchJson(route('todo.edit', $this->todoList->id))->json();


        $this->assertSame('test todo 1', $response['name']);
    }
}
