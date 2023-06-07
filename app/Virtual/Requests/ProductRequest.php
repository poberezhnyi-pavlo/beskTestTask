<?php

declare(strict_types=1);

namespace App\Virtual\Requests;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Product request",
 *     description="Product request",
 *     type="object",
 *     required={"name", "price_in_usd"}
 * )
 */
class ProductRequest
{
    /**
     * @OA\Property(
     *     title="name",
     *     description="name",
     *     format="string",
     *     example="name"
     * )
     */
    public string $name;

    /**
     * @OA\Property(
     *     title="description",
     *     description="description",
     *     format="string",
     *     example="description"
     * )
     */
    public ?string $description;

    /**
     * @OA\Property(
     *     title="price_in_usd",
     *     description="price in usd",
     *     format="float",
     *     example="2.3"
     * )
     */
    public ?string $price_in_usd;
}
