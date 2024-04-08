<?php

namespace Models;

class User extends Database
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function all()
    {
        return $this->query("SELECT * FROM users")->fetchAll();
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM users WHERE id = :id", ['id' => $id])->fetch();
    }

    public function create($data)
    {
        return $this->insert("users", $data);
    }

    public function update($id, $data)
    {
        return $this->update("users", $id, $data);
    }

    public function delete($id)
    {
        return $this->delete("users", $id);
    }
}