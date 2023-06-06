<?php

declare(strict_types=1);

namespace App\Virtual\Requests\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Register new User request",
 *     description="Register new User request data",
 *     type="object",
 *     required={"first_name", "last_name", "email", "sex", "birthday", "password", "password_confirmation"}
 * )
 */
class RegisterRequest
{
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Mame",
     *     format="string",
     *     example="Name"
     * )
     */
    public string $name;

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

    /**
     * @OA\Property(
     *     title="password_confirmation",
     *     description="password_confirmation",
     *     format="password",
     *     minLength=8,
     *     example="password"
     * )
     */
    public string $password_confirmation;
}
