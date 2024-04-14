<?php

namespace Models;

use Core\Database\Model;
/**
 * @property mixed $title
 * @property mixed $description
 * @property mixed $deadline
 * @property mixed $completed
 * @property mixed $user_id
 */
class Task extends Model
{
    static $table = 'tasks';

    protected array $fillable = ['title', 'description', 'deadline', 'completed', 'user_id'];

}