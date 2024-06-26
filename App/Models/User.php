<?php

namespace Models;

use Core\Database\Model;

class User extends Model
{
    static $table = 'users';

    protected array $fillable = ['username', 'email', 'password'];

    public $username;
    public $email;
    public $password;

    public function login(): void {
        $_SESSION['user'] = $this->username;
        $_SESSION['id'] = $this->id;
        session_regenerate_id(true);
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}