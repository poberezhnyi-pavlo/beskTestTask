<?php

declare(strict_types=1);

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product",
 *     @OA\Xml(
 *         name="Product"
 *     )
 * )
 */
class Product
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="id",
     *     format="integer",
     *     example="1"
     * )
     */
    private int $id;

    /**
     * @OA\Property(
     *     title="name",
     *     description="name",
     *     format="string",
     *     example="product 1"
     * )
     */
    private string $name;

    /**
     * @OA\Property(
     *     title="description",
     *     description="description",
     *     format="string",
     *     example="description"
     * )
     */
    private string $description;

    /**
     * @OA\Property(
     *     title="price_in_usd",
     *     description="price_in_usd",
     *     format="float",
     *     example="3.20"
     * )
     */
    private float $price_in_usd;

    /**
     * @OA\Property(
     *     title="price_in_uah",
     *     description="price_in_uah",
     *     format="float",
     *     example="3.20"
     * )
     */
    private float $price_in_uah;

    /**
     * @OA\Property(
     *     title="price_in_gbp",
     *     description="price_in_gbp",
     *     format="float",
     *     example="3.20"
     * )
     */
    private float $price_in_gbp;

    /**
     * @OA\Property(
     *     title="owner",
     *     description="Data owner"
     * )
     * @var Owner[]
     */
    private array $owner;


    /**
     * @OA\Property(
     *     title="created_at",
     *     description="date time creating",
     *     format="date-time",
     *     example="2017-07-21T17:32:28Z"
     * )
     */
    private string $created_at;

    /**
     * @OA\Property(
     *     title="updated_at",
     *     description="date time updating",
     *     format="date-time",
     *     example="2017-07-21T17:32:28Z"
     * )
     */
    private string $updated_at;
}
