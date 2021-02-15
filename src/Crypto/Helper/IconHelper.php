<?php

declare(strict_types=1);

namespace Crypto\Helper;

class IconHelper
{
    const PRICE_UP   = 'i7465';
    const PRICE_DOWN = 'i7463';

    const ICONS = [
        'BTC'   => '857',
        'ETH'   => '9013',
        'XRP'   => '10014',
        'ADA'   => '15385',
        'LTC'   => '17376',
        'NEO'   => '18806',
        'XLM'   => '15391',
        'EOS'   => '15390',
        'IOT'   => '15384',
        'XEM'   => '15393',
        'DASH'  => '10007',
        'XMR'   => '17416',
        'LSK'   => '18805',
        'NANO'  => '18214',
        'ETC'   => '15386',
        'TRX'   => '17035',
        'ZEC'   => '19405',
        'OMG'   => '13656',
        'BNB'   => '16699',
        'XVG'   => '20648',
        'SNT'   => '16931',
        'ETN'   => '22211',
        'LINK'  => '34832',
        'DOT'   => '39813',
        'YFI'   => '40040',
        'YFII'  => '40041',
        'COMP'  => '40042',
        'OXT'   => '40043',
        'UNI'   => '40286',
        'DNT'   => '40958',
        'BAND'  => '40959',
        'CVC'   => '40960',
        'DAI'   => '40961',
        'WBTC'  => '40962',
        'GRO'   => '41367',
        'CEL'   => '42826',
        'FIL'   => '43222',
        'ZRX'   => '43223',
        'SNX'   => '43224',
        'XTZ'   => '32978',
        'CHSB'  => '43303',
        'DOGE'  => '2869',
        'NEXO'  => '43370',
        'BCH'   => '39690',
        'AAVE'  => '43603',
        'ALGO'  => '43605',
        'NU'    => '43607',
        'SUSHI' => '43608',
        'ATOM'  => '43609',
        'GRT'   => '43610',
        'REN'   => '43611',
        '1INCH' => '43662',
        'CAKE'  => '43664',
        'VET'   => '24459',
    ];

    /**
     * @param string $code
     * @return string
     */
    public static function getIcon(string $code): string
    {
        return isset(self::ICONS[$code]) ? 'i' . self::ICONS[$code] : 'null';
    }
}
