<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends Controller
{
    //

    public function index()
    {

        $todo = TodoList::all();

        return response()->json([
            'list' => $todo
        ]);
    }

    public function show(TodoList $todoList)
    {


        return response()->json([
            'todo' => $todoList
        ]);
    }


    public function store(Request $request)
    {

        $todo = TodoList::create([

            'name' => $request->name
        ]);

        return response()->json([
            $todo,

        ], Response::HTTP_CREATED);
    }


public function delete(TodoList $todoList){

       $todo =  $todoList->delete();

       return response()->json([
         $todo
       ],  Response::HTTP_NO_CONTENT);

    }


    public function edit(TodoList $todoList){

        $todoList->update([
            'name' => 'test todo 1'
        ]);

        return response()->json([
            'name' => $todoList->name
        ]);
    }




}
