<?php

namespace Controllers;

use Core\Http\Request;
use Models\Task;
use Models\User;

class TaskController
{
    public function index()
    {
        $tasks = Task::all();
        view('tasks/index', [
            'page_title' => 'My Tasks',
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        view('tasks/create', [
            'page_title' => 'Create Task'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'deadline' => 'required'
        ]);
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->start_date = $request->input('start_date');
        $task->deadline = $request->input('deadline');
        $task->completed = 0;

        $user = User::where('username', $_SESSION['user']);
        $task->user_id = $user->id;
        $task->save();

        redirect('/tasks');
    }
}