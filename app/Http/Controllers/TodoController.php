<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function index(){

        $todo = TodoList::create([
            'name' => 'Todo',
        ]);

        return response()->json([
            'list' => $todo
        ]);
    }
}
