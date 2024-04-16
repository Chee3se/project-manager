<?php

namespace Core\Database;

use Core\Container\App;

/**
 * @property $id
 */
abstract class Model
{
    static $connection = null;
    static $table;
    protected array $fillable = [];
    public $id;

    function __construct()
    {
        static::$connection ?? static::$connection = App::resolve(Database::class);
        foreach ($this->fillable as $column) {
            $this->{$column} = '';
        }
    }

    public static function find($id): bool|Model
    {
        if (!self::$connection) {
            self::$connection = App::resolve(Database::class);
        }
        $db = self::$connection;
        $data = $db->query("SELECT * FROM ".static::$table." WHERE id = :id", compact('id'))->fetch();

        if (!$data) { return false; }

        $model = new static;
        foreach ($data as $key => $value) {
            $model->{$key} = $value;
        }
        $model->{'id'} = $id;
        return $model;
    }

    public static function where($column, $value, $isarray = false): bool|Model|array
    {
        if (!self::$connection) {
            self::$connection = App::resolve(Database::class);
        }
        $db = self::$connection;
        // Check if user is asking for multiple values (array)

        if ($isarray) {
            $data = $db->query("SELECT * FROM ".static::$table." WHERE {$column} = :{$column}", [$column => $value])->fetchAll();
            if (!$data) { return false; }
            return $data;
        }
        // Check if user is asking for a single value (Model)
        $data = $db->query("SELECT * FROM ".static::$table." WHERE {$column} = :{$column}", [$column => $value])->fetch();
        if (!$data) { return false; }
        $model = new static;

        foreach ($data as $key => $value) {
            $model->{$key} = $value;
        }
        return $model;

    }

    public static function all(): bool|array
    {
        static::$connection ?? static::$connection = App::resolve(Database::class);
        $db = static::$connection;
        $data = $db->query("SELECT * FROM ".static::$table, [])->fetchAll();
        if (!$data) { return false; }
        return $data;
    }

    public function save()
    {
        $db = static::$connection;
        $data = [];
        foreach ($this->fillable as $column) {
            $data[$column] = $this->{$column};
        }
        if ($this->id) {
            $db->update(static::$table, $this->id, $data);
        } else {
            $db->insert(static::$table, $data);
        }
    }

    public function delete()
    {
        $db = static::$connection;
        $db->delete(static::$table, $this->id);
    }
}