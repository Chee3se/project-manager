<?php

namespace Core\Database;

use Exception;
use PDO;
use PDOStatement;

class Database
{
    public $connection;

    public function __construct($config)
    {
        $connection_string = "mysql:".http_build_query($config, '', ';');
        $this->connection = new PDO($connection_string);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function query($query_string, $params = []): false|PDOStatement
    {
        $query = $this->connection->prepare($query_string);
        try {
            $query->execute($params);
        } catch (Exception $e) {
            http_response_code(500);
            require base_path("views/500.view.php");
            console_error($e->getMessage());
            die();
        }
        return $query;
    }

    public function delete($table, $id): void
    {
        $this->query(
            "DELETE FROM $table WHERE id = :id",
            [':id' => $id]
        );
    }

    public function insert($table, $data): void
    {
        $fields = array_keys($data);
        $values = array_values($data);
        $placeholders = array_map(function ($field) {
            return ":$field";
        }, $fields);
        $this->query(
            "INSERT INTO $table (".implode(',', $fields).") VALUES (".implode(',', $placeholders).")",
            array_combine($placeholders, $values)
        );
    }

    public function update($table, $id, $data): void
    {
        $fields = array_keys($data);
        $placeholders = array_map(function ($field) {
            return "$field = :$field";
        }, $fields);
        $this->query(
            "UPDATE $table SET ".implode(', ', $placeholders)." WHERE id = :id",
            array_merge($data, [':id' => $id])
        );
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}