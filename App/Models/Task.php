<?php

namespace Models;

use Core\Database\Model;

class Task extends Model
{
    static $table = 'tasks';

    protected array $fillable = ['description', 'start_date', 'due_date', 'status', 'user_id','project_id'];

    public $description;
    public $start_date;
    public $due_date;
    public $status;
    public $project_id;
    public $user_id;

}