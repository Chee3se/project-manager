<?php

namespace Controllers;

use Core\Request;
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
            'username' => 'required|min:3|max:20',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        $user=new User();
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();

        header("Location: /login");
    }
}