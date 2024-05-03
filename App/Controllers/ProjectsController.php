<?php

namespace Controllers;
use Cassandra\Date;
use Core\Http\Request;
use Models\Projects;
use Models\Projects_users;
use Models\User;
use Core\Session\Session;

class ProjectsController
{

    public function index()
    {

        //members sort
        $projects = Projects::where('owner_id', $_SESSION['id'],true);
        $projects_users = Projects_users::all();
        $members = [];
        if ($projects_users){


            foreach ($projects as $project) {
                    $owner = $project['owner_id'];

                foreach ($projects_users as $projects_user) {
                    if($project['id'] == $projects_user['project_id']){
                    $user = User::find($projects_user['user_id']);
                        if ($user->id != $owner){
                            $members[] = $user;
                        }
                    }
                }
            }
        }

        view('projects/index', [
            'page_title' => 'My projects',
            'projects' => $projects,
            'members' => $members

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
    public function add(){
        $members = User::all();
        $users = Projects_users::all();
        view('projects/members', [
            'page_title' => 'Add members',
            'users' => $members,
            'members' => $users
        ]);


    }
    public function members(Request $request){

        Session::put('project_id',$_GET['project_id']??Session::get('project_id'));
        $projects_user= new Projects_users();
        $projects_user->project_id = Session::get('project_id');
        $projects_user->user_id = $request->input('id');
        $projects_user->save();

        redirect('/projects');
    }

}