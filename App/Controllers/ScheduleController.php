<?php

namespace Controllers;

use Cassandra\Date;
use Core\Http\Request;
use Models\Schedule;
use Models\User;

class ScheduleController
{
    public function index(){

        view('projects/index', [
            'page_title' => 'My projects',

        ]);
    }


}