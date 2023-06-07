<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\Currency;
use Illuminate\Support\Facades\Cache;

final class CurrencyCacheService implements CurrencyInterface
{
    private const TTL = 60 * 60; // 1 hour

    public function __construct(readonly private CurrencyApiService $currencyApiService) { }

    public function getRate(Currency $currency): float
    {
        return Cache::remember($currency->name, self::TTL, fn() => $this->currencyApiService->getRate($currency));
    }
}
