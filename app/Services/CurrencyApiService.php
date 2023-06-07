<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\Currency;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

final class CurrencyApiService implements CurrencyInterface
{
    private const BASE_URL = 'https://api.apilayer.com/fixer/latest';
    private const BASE_CURRENCY = 'USD';

    public function __construct(readonly private Client $client)
    {
    }

    public function getRate(Currency $currency): float
    {
        $response = $this->client->get(self::BASE_URL . '?base=' . self::BASE_CURRENCY . '&symbols=' . $currency->name, [
            'headers' => [
                'apiKey' => config('currency.api_key'),
            ],
        ]);

        if ($response->getStatusCode() === Response::HTTP_OK) {
            $body = $response->getBody();
            $content = $body->getContents();

            return json_decode($content, true)['rates'][$currency->name];
        }

        throw new \RuntimeException('error api currency converter');
    }
}
