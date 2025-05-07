<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:class,event',
            'decription' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price_cents' => 'required|integer|min:0',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        Task::create($data);
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:class,event',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price_cents' => 'required|integer|min:0',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        $task->update($data);
        return redirect()->route('tasks.index');

    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}
