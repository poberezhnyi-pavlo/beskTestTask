<?php

declare(strict_types=1);

namespace App\Virtual\Resources;

use App\Virtual\Models\Token;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="TokenResource",
 *     description="Token resource",
 *     @OA\Xml(
 *         name="TokenResource"
 *     )
 * )
 */
final class TokenResource
{
    /**
     * @OA\Property(
     *     title="data",
     *     description="Data wrapper"
     * )
     * @var Token[]
     */
    private array $data;
}
