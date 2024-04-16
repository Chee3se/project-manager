<?php

namespace Core\Http;

use Core\Session\Session;
use Core\Validation\Validator;

class Request
{
    protected array $data;
    protected array $server;

    public function __construct($data, $server)
    {
        $this->data = $data;
        $this->server = $server;
    }

    public function all()
    {
        return $this->data;
    }

    public function input($key)
    {
        return $this->data[$key];
    }

    public function validate($data)
    {
        Validator::set_data($this->data);
        $errors = [];
        foreach ($data as $key => $value) {
            $field = $key;
            try {
                $field_value = trim($this->data[$field]);
            } catch (\Exception $e) {
                $field_value = null;
            }
            is_array($value) ?: $value = explode('|', $value);
            $rules = $value;
            foreach ($rules as $rule) {
                $rule = explode(':', $rule);
                $rule_name = $rule[0];
                $rule_value = $rule[1] ?? null;
                if (!empty($rule_value)) {
                    $rule_value = strpos($rule_value, ',') ? explode(',', $rule_value) : $rule_value;
                }
                try {
                    $result = Validator::$rule_name($field_value, $rule_value);
                } catch (\Exception $e) {
                    $result = $e->getMessage();
                }
                if ($result) {
                    $errors[$field][] = "The {$field} {$result}";
                }
            }

        }

        if (!empty($errors)) {
            Session::flash('errors', $errors);
            Session::flash('old', $this->data);
            $uri = Session::get('old_uri');
            redirect($uri);
            exit();
        }
        return;
    }

    public function error($field, $error)
    {
        Session::flash('errors', [$field => [$error]]);
        Session::flash('old', $this->data);
        $uri = Session::get('old_uri');
        redirect($uri);
        exit();
    }
}