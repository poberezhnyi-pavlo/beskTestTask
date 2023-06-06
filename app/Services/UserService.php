<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\UserType;
use App\Models\User;

final class UserService
{
    public function getUserByEmail(string $email): User
    {
        return User::query()->whereEmail($email)->firstOrFail();
    }

    public function grantModerator(User $user): void
    {
        $user->type = UserType::MODERATOR;
        $user->save();
    }
}
