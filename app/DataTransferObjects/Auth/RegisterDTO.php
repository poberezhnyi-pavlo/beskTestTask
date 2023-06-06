<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Auth;

class RegisterDTO
{
    public function __construct(
        readonly public string $name,
        readonly public string $email,
        readonly public string $password,
    ) {
    }

    public static function fromRequest(array $userData): self
    {
        return new self(
            name: $userData['name'],
            email: $userData['email'],
            password: $userData['password'],
        );
    }
}
