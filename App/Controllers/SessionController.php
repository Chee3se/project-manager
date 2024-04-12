<?php

namespace Controllers;

use Core\Request;
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

        //$user=User::where('username',$request->input('username'));
        $user = User::find(2);
        dd([$user,$user->password, $request->input('password')]);
        if($user){
            if($user->password==$request->input('password')){
                dd($user);
            }
        }
        header("Location: /login");


    }
}