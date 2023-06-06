<?php

declare(strict_types=1);

namespace App\Services;

use App\DataTransferObjects\Auth\RegisterDTO;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class RegisterService
{
    public function register(RegisterDTO $userRegisterDTO): User
    {
        $user = new User();
        $user->name = $userRegisterDTO->name;
        $user->email = $userRegisterDTO->email;
        $user->password = Hash::make($userRegisterDTO->password);
        $user->type = UserType::CLIENT;

        $user->save();

        return $user;
    }
}
