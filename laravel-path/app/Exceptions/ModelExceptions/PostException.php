<?php

namespace App\Exceptions\ModelExceptions;

class PostException extends \Exception
{
    public static function UserMaxPostReached()
    {
        return new static("User max post limit reached.");
    }
}
