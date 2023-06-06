<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Auth;

class LoginDTO
{
    public function __construct(
        readonly public string $email,
        readonly public string $password,
    ) {
    }

    public static function fromRequest(array $loginData): self
    {
        return new self(
            email: $loginData['email'],
            password: $loginData['password'],
        );
    }
}
