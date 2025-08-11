<?php
namespace App;

class EmptyStringException extends \Exception
{
    public function __construct($message = "Value cannot be an empty string.", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
