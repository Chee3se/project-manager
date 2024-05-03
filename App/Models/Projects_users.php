<?php

namespace Models;
use Core\Database\Model;
class Projects_users extends Model
{
    static $table = 'project_users';

    protected array $fillable = ['project_id','user_id'];

    public $project_id;

    public $user_id;


}