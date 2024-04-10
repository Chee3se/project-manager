<?php

namespace Controllers;

class LoginController
{
    public function index()
    {
        view('login/index', [
            'page_title' => 'Login page'
        ]);
    }
}