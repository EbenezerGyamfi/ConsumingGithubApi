<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function index(){

        $todo = TodoList::all();

        return response()->json([
            'list' => $todo
        ]);
    }

    public function show(TodoList $todoList){


        return response()->json([
            'todo' => $todoList
        ]);

    }
}
