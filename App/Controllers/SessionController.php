<?php

namespace Controllers;

use Core\Http\Request;
use Core\Session\Session;
use Models\User;

class SessionController
{
    public function create()
    {
        view('session/create', [
            'page_title' => 'Login'
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:20',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $user = User::where('username', $username);
        if ($user && password_verify($password, $user->password)) {
            $user->login();
            redirect('/projects');
            exit();
        }

        $request->error('username', 'Invalid username or password');

        Session::put('project_id');
    }
    public function destroy()
    {
        $user = User::where('username', $_SESSION['user']);
        $user->logout();
        redirect('/login');
    }
}