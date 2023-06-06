<?php

declare(strict_types=1);

namespace App\Virtual\Requests\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Login User request",
 *     description="Login User request data",
 *     type="object",
 *     required={"email", "password"}
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     *     title="email",
     *     description="email",
     *     format="email",
     *     example="email@example.com"
     * )
     */
    public string $email;

    /**
     * @OA\Property(
     *     title="password",
     *     description="password",
     *     format="password",
     *     minLength=8,
     *     example="password"
     * )
     */
    public string $password;
}
