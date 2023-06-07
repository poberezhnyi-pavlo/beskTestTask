<?php

namespace App\Services;

use App\Enums\Currency;

interface CurrencyInterface
{
    public function getRate(Currency $currency): float;
}
