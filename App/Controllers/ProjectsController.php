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
}