<?php

declare(strict_types=1);

namespace App\Services\Moderator;

use App\DataTransferObjects\ProductDTO;
use App\Enums\Currency;
use App\Models\Product;
use App\Models\User;
use App\Services\CurrencyInterface;
use Illuminate\Support\Collection;

final class ProductService
{

    public function __construct(readonly private CurrencyInterface $currencyService)
    {
    }

    public function getAll(): Collection
    {
        return Product::query()->with('owner')
            ->get()
            ->transform(function(Product $product) {
                $product->price_in_uah = round($product->price_in_usd / $this->currencyService->getRate(Currency::UAH), 2);
                $product->price_in_gbp = round($product->price_in_usd / $this->currencyService->getRate(Currency::GBP), 2);

                return $product;
            })
        ;
    }

    public function save(ProductDTO $productDTO, User $user): Product
    {
        $product = new Product();

        $product->name = $productDTO->name;
        $product->price_in_usd = $productDTO->priceInUsd;
        $product->description = $productDTO->description;
        $product->owner_id = $user->id;

        $product->save();

        return $product;
    }

    public function update(ProductDTO $productDTO, Product $product): Product
    {
        $product->name = $productDTO->name;
        $product->price_in_usd = $productDTO->priceInUsd;
        $product->description = $productDTO->description;

        $product->save();

        return $product;
    }

    public function show(Product $product): Product
    {
        $product->load('owner');

        $product->price_in_uah = round($product->price_in_usd / $this->currencyService->getRate(Currency::UAH), 2);
        $product->price_in_gbp = round($product->price_in_usd / $this->currencyService->getRate(Currency::GBP), 2);

        return $product;
    }
    public function delete(Product $product): void
    {
        $product->delete();
    }
}
