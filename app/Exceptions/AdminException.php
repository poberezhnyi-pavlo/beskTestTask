<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class AdminException extends CustomException
{
    private const MESSAGE = 'You is not admin';
    private const CODE = 403;

    public static function isNotAdmin(): AdminException
    {
        return new self(message: self::MESSAGE, code: self::CODE);
    }
}
