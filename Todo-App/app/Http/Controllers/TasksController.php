<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $Tasks = Task::all();
        return view('tasks.index', ['tasks' => $Tasks]);
    }
    public function create()
    {
        return view('tasks.create');
    }
    public function store(TaskRequest $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
        ]);

        $request->session()->flash('alert-success', 'Todo Created Successfully');

        return to_route('tasks.index');
    }
    public function show($id)
    {
        $task = Task::find($id);
        if(! $task){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return to_route('tasks.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view('tasks.show', ['task' => $task]);
    }
    public function edit($id)
    {
        $task = Task::find($id);
        if(! $task){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return to_route('tasks.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        } 
        return view('tasks.edit', ['task' => $task]);
    }
    public function update(TaskRequest $request)
    {
        $task = Task::find($request->task_id);
        if(! $task){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return to_route('tasks.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        } 

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed
        ]);
        $request->session()->flash('alert-info', 'Todo Updated Successfully');
        return to_route('tasks.index');
    }
    public function destroy(Request $request)
    {
        $task = Task::find($request->task_id);
        if(! $task){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return to_route('tasks.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        } 

        $task->delete();
        $request->session()->flash('alert-success', 'Todo Deleted Successfully');
        return to_route('tasks.index');
    }
}
