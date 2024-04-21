<?php

namespace Controllers;
use Cassandra\Date;
use Core\Http\Request;
use Models\Projects;
use Models\User;

class ProjectsController
{

    public function index()
    {
        $projects = Projects::all();
        view('projects/index', [
            'page_title' => 'My projects',
            'projects' => $projects
        ]);
    }
    public function create()
    {
        view('projects/create', [
            'page_title' => 'Create Project'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $projects = new Projects();
        $projects->name = $request->input('name');
        $user = User::where('username', $_SESSION['user']);
        $projects->owner_id = $user->id;
        $projects->save();

        redirect('/projects');
    }
}