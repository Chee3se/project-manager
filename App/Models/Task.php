<?php

namespace Models;

use Core\Database\Model;

class Task extends Model
{
    static $table = 'tasks';

    protected array $fillable = ['title', 'description', 'deadline', 'completed', 'user_id'];

}