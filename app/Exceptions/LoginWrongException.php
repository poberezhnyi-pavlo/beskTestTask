<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class LoginWrongException extends CustomException
{
    private const MESSAGE = 'Wrong credential';
    private const CODE = 401;

    public static function show(): LoginWrongException
    {
        return new self(message: self::MESSAGE, code: self::CODE);
    }
}
