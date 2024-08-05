<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function index()
    {
        $todos = ToDo::all();
        return view('index', compact('todos'));
    }

    public function store(Request $request)
    {
        ToDo::create($request->all());
        return redirect()->route('todos.index');
    }

    public function update(Request $request, ToDo $todo)
    {
        $todo->update(['completed' => $request->has('completed')]);
        return redirect()->route('todos.index');
    }

    public function destroy(ToDo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
