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

                foreach ($projects_users as $projects_user) {
                    if($project['id'] == $projects_user['project_id']){
                    $user = User::find($projects_user['user_id']);
                            $members[] = $user;

                    }
                }
            }
        }

        view('projects/index', [
            'page_title' => 'My projects',
            'projects' => $projects,
            'members' => $members,
            'projects_users' => $projects_users

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
        Session::put('project_id',$_GET['project_id']??Session::get('project_id'));
        $users = User::all();




            view('projects/members', [
                'page_title' => 'Add members',
                'users' => $users,
            ]);
        }



    public function members(){

        $members = $_POST['members'];

        foreach ($members as $member){

            $projects_user= new Projects_users();
            $projects_user->project_id = Session::get('project_id');
            $projects_user->user_id = $member;
            $projects_user->save();
        }

        redirect('/projects');
    }

    public function destroy($id)
    {

        $project_users=Projects_users::where('user_id',$id);

        if($project_users){
            $project_users->delete();
        }

        redirect('/projects');
    }

}