<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 0, $max = INF) : bool
    {
        $value = trim($value);

        return is_string($value) && strlen($value) > $min && strlen($value) <= $max;
    }

    public static function number($value, $min = 0, $max = INF) : bool
    {
        return is_numeric($value) && $value > $min && $value <= $max;
    }
}