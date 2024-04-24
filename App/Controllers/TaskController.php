<?php

namespace Controllers;

use Cassandra\Date;
use Core\Http\Request;
use Core\Session\Session;
use Models\Projects;
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

        Session::put('project_id',$_GET['project_id']??Session::get('project_id'));

        $tasks = Task::where('project_id',Session::get('project_id'),true);
        view('tasks/index', [
            'page_title' => 'My Tasks',
            'tasks' => $tasks,

        ]);

    }

    public function create()
    {

        view('tasks/create', [
            'page_title' => 'Create Task',

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'due_date' => 'required|not_today'
        ]);
        $task = new Task();

        $task->project_id = Session::get('project_id');
        $task->description = $request->input('description');
        $task->start_date = date('Y-m-d');
        $task->due_date = $request->input('due_date');
        $task->status = 'assigned';
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