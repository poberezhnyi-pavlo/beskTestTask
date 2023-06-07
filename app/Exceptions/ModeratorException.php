<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class ModeratorException extends CustomException
{
    private const MESSAGE = 'You is not moderator';
    private const CODE = 403;

    public static function isNotModerator(): ModeratorException
    {
        return new self(message: self::MESSAGE, code: self::CODE);
    }
}
