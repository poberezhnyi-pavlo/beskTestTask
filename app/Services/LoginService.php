<?php

declare(strict_types=1);

namespace App\Services;

use App\DataTransferObjects\Auth\LoginDTO;
use App\Exceptions\LoginWrongException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class LoginService
{
    /**
     * @throws LoginWrongException
     */
    public function login(LoginDTO $loginDTO, User $user): array
    {
        if (! Auth::attempt(['email' => $loginDTO->email, 'password' => $loginDTO->password])) {
            throw LoginWrongException::show();
        }

        $token = $user->createToken('API TOKEN')->plainTextToken;

        return [
            'token' => $token,
        ];
    }
}
