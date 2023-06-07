<?php

declare(strict_types=1);

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Owner",
 *     description="Owner",
 *     @OA\Xml(
 *         name="Owner"
 *     )
 * )
 */
class Owner
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
     *     example="name"
     * )
     */
    private string $name;
}
