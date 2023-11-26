<?php


class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        $valueLength = strlen($value);

        return $valueLength >= $min && $valueLength <= $max;
    }
}


Validator::string(value: "Hello World!", min: 3, max: 15);
