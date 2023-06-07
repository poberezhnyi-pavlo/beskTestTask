<?php

declare(strict_types=1);

namespace App\Virtual\Resources;

use App\Virtual\Models\Token;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="ProductResource",
 *     description="Product resource",
 *     @OA\Xml(
 *         name="ProductResource"
 *     )
 * )
 */
class ProductResource
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
