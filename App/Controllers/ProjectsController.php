<?php

namespace Controllers;
use Cassandra\Date;
use Core\Http\Request;
use Models\Projects;
use Models\Projects_users;
use Models\Task;
use Models\User;
use Core\Session\Session;

class ProjectsController
{

    public function index()
    {
        $projects = [];
        //members sort
        $projects_users = Projects_users::all();

        // If the user is not an owner find the projects that the user is a member of
        $user_in_projects = Projects_users::where('user_id', $_SESSION['id'],true);
        if ($user_in_projects) {
            foreach ($user_in_projects as $entry) {
                $project = Projects::where('id', $entry['project_id'], true);
                if (!$project) {continue;}
                $projects[] = $project[0];
            }
        }


        // Get the members of each project
        $members = [];
        if ($projects && $projects_users){
            foreach ($projects as $project) {
                foreach ($projects_users as $projects_user) {
                    if($project['id'] == $projects_user['project_id']){
                    $user = User::find($projects_user['user_id']);
                            $members[$project['id']][] = $user;
                    }
                }
            }


        }
        view('projects/index', [
            'page_title' => 'My projects',
            'projects' => $projects,
            'members' => $members,
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
        $project = new Projects();
        $project->name = $request->input('name');
        $user = User::where('username', $_SESSION['user']);
        $project->owner_id = $user->id;
        $project->save();

        // Create a new instance of Projects_users
        $projects_users = new Projects_users();
        $projects_users->project_id = $project->id;
        $projects_users->user_id = $user->id;
        $projects_users->save();

        redirect('/projects');
    }
    public function add(){
        Session::put('project_id',$_GET['project_id']??Session::get('project_id'));
        $users = User::all();
        // Remove those who are already members
        $projects_users = Projects_users::where('project_id',Session::get('project_id'),true);
        $members = [];
        foreach ($projects_users as $projects_user){
            $members[] = $projects_user['user_id'];
        }
        $users = array_filter($users, function($user) use ($members){
            return !in_array($user['id'], $members);
        });

        view('projects/members', [
            'page_title' => 'Add members',
            'users' => $users,
        ]);
    }



    public function members(){

        $members = $_POST['members'];


        $projects_users = Projects_users::where('project_id',Session::get('project_id'),true);

        foreach ($members as $member){
            // Skip adding if already added
            $found_user=false;
            foreach ($projects_users as $user){

                if($user['user_id'] == $member){
                    $found_user=true;
                }
            }
            if ($found_user) {continue;}

            $projects_user= new Projects_users();
            $projects_user->project_id = Session::get('project_id');
            $projects_user->user_id = $member;
            $projects_user->save();
        }

        redirect('/projects');
    }

    public function delete_member($id) {
        // find project_user by user_id
        $project_user = Projects_users::where('user_id',$id);

        // if user exists, delete them.
        if($project_user){
            $project_user->delete();
        }

        redirect('/projects');
    }

    public function destroy($id)
    {
        $project =Projects::find($id);

        if($project){
            // Delete recursive
            // Delete the users associated with the project
            $users = Projects_users::where('project_id', $id, true);
            foreach ($users as $user) {
                Projects_users::find($user["id"])->delete();
            }
            // Delete the tasks associated with the project
            $tasks = Task::where('project_id', $id, true);
            foreach ($tasks as $task) {
                Task::find($task["id"])->delete();
            }

            $project->delete();
        }



        redirect('/projects');
    }




}