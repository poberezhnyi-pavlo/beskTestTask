<?php

declare(strict_types=1);

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Token",
 *     description="Token",
 *     @OA\Xml(
 *         name="Token"
 *     )
 * )
 */
final class Token
{
    /**
     * @OA\Property(
     *     title="token",
     *     description="token",
     *     format="string",
     *     example="token"
     * )
     */
    private string $token;
}
