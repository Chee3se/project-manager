<?php

namespace Models;

use Core\Database\Model;
class Projects extends Model
{
    static $table = 'projects';

    protected array $fillable = ['name','owner_id'];

    public $name;

    public $owner_id;
}