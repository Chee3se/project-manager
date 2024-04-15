<?php

namespace Models;

use Core\Database\Model;
/**
 * @property mixed $title
 * @property mixed $description
 * @property mixed $start_date
 * @property mixed $deadline
 * @property mixed $completed
 * @property mixed $user_id
 */
class Task extends Model
{
    static $table = 'tasks';

    protected array $fillable = ['title', 'description', 'start_date', 'deadline', 'completed', 'user_id'];

}