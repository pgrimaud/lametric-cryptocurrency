<?php

declare(strict_types=1);

namespace Crypto;

use Crypto\Helper\IconHelper;

class Response
{
    /**
     * @param array $data
     *
     * @return string
     */
    public function asJson(array $data = []): string
    {
        return json_encode($data);
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function error(string $value = 'INTERNAL ERROR'): string
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $value,
                    'icon'  => 'null',
                ],
            ],
        ]);
    }

    /**
     * @param Currency $currency
     *
     * @return string
     */
    public function data(Currency $currency): string
    {
        $frames = [];

        /** @var Currency $currency */
        $frames[] = [
            'index' => 0,
            'text'  => $this->formatPrice((float)$currency->getPrice()) . $this->getSymbol($currency),
            'icon'  => IconHelper::getIcon($currency->getCode()),
        ];

        if ($currency->isShowChange()) {
            $frames[] = [
                'index' => 1,
                'text'  => ($currency->getChange() > 0 ? '+' : '') . $currency->getChange() . '%',
                'icon'  => ($currency->getChange() > 0 ? IconHelper::PRICE_UP : IconHelper::PRICE_DOWN),
            ];
        }

        return $this->asJson([
            'frames' => $frames,
        ]);
    }

    /**
     * @param float $price
     *
     * @return string
     */
    private function formatPrice(float $price = 0.0): string
    {
        if ($price < 10) {
            $fractional = 4;
        } elseif ($price >= 10 && $price < 100) {
            $fractional = 3;
        } elseif ($price >= 100 && $price < 1000) {
            $fractional = 2;
        } elseif ($price >= 1000 && $price < 10000) {
            $fractional = 1;
        } else {
            $fractional = 0;
        }

        // round with fractional previously calculated
        $price = round($price, $fractional);

        if ($price > 10e5) {
            $price = round(($price / 10e5), 2) . 'M';
        }

        return (string)$price;
    }

    /**
     * @param Currency $currency
     *
     * @return string
     */
    private function getSymbol(Currency $currency): string
    {
        return $currency->isSatoshi() ? '' : '$';
    }

}
