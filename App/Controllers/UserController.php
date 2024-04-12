<?php

namespace Controllers;

use Core\Http\Request;
use Models\User;

class UserController
{
    public function create(Request $request)
    {
        view('user/create', [
            'page_title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:20|unique:users,username',
            'email' => 'required|email',
            'password' => 'required|min:6|max:20|confirmed',
            'confirm_password' => 'required'
        ]);

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();

        header("Location: /login");
        exit();
    }

    public function show(Request $request)
    {
        $user = User::where('username', $_SESSION['user']);
        view('user/show', [
            'page_title' => 'Profile',
            'user' => $user
        ]);
    }
}