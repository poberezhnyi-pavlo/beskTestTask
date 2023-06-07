<?php

declare(strict_types=1);

namespace App\Virtual\Resources;

use App\Virtual\Models\Product;
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
     * @var Product[]
     */
    private array $data;
}
