<?php

namespace Controllers;

use Cassandra\Date;
use Core\Http\Request;
use Models\Task;
use Models\User;

class TaskController
{
    public function update_status()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $task = Task::find($id);
        $task->status = $status;
        $task->save();
    }
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
            'deadline' => 'required|not_today'
        ]);
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->start_date = date('Y-m-d');
        $task->deadline = $request->input('deadline');
        $task->status = 'todo';
        $user = User::where('username', $_SESSION['user']);
        $task->user_id = $user->id;
        $task->save();

        redirect('/tasks');
    }
    public function destroy($id)
    {

        $task=Task::find($id);

        if($task){
            $task->delete();

        }
        redirect('/tasks');
    }
}