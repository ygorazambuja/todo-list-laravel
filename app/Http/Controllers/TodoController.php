<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //

    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function store()
    {

        $todo = Todo::create([
            'title' => request('title'),
            'description' => request('description'),
            'completed' => false
        ]);

        return response()->json($todo);
    }

    public function update(Todo $todo)
    {
        $todo->update([
            'title' => request('title'),
            'description' => request('description'),
            'completed' => request('completed')
        ]);

        return response()->json($todo);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(['message' => 'Todo deleted']);
    }
}
