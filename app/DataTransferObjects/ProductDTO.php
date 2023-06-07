<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

final class ProductDTO
{
    public function __construct(
        readonly public string $name,
        readonly public float $priceInUsd,
        readonly public ?string $description,
    ) {
    }

    public static function fromRequest(array $productData): self
    {
        return new self(
            name: $productData['name'],
            priceInUsd: $productData['price_in_usd'],
            description: $productData['description'],
        );
    }
}
