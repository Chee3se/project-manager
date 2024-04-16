<?php

namespace Models;

use Core\Database\Model;

class Task extends Model
{
    static $table = 'tasks';

    protected array $fillable = ['title', 'description', 'start_date', 'deadline', 'completed', 'user_id'];

    public $title;
    public $description;
    public $start_date;
    public $deadline;
    public $completed;
    public $user_id;

}