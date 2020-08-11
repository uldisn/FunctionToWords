<?php
namespace uldisn\FunctionToWords;
class FunctionToWords
{

    private static $numb = ['nulle', 'viens', 'divi', 'trīs', 'četri', 'pieci', 'seši', 'septiņi', 'astoņi', 'deviņi', 'desmit'];
    private static $tens = ['', 'vien', 'div', 'trīs', 'četr', 'piec', 'seš', 'septiņ', 'astoņ', 'deviņ'];
    private static $bigones = [100 => 'simti', 1000 => 'tūkstoši', 1000000 => 'miljoni', 1000000000 => 'miljardi'];
    
    private static $currencies = [
        'EUR' => [
            'mainSingular'  => 'eiro',
            'mainPlural'    => 'eiro',
            'minorSingular' => 'cents',
            'minorPlural'   => 'centi',
        ],
        'USD' => [
            'mainSingular'  => 'dolārs',
            'mainPlural'    => 'dolāri',
            'minorSingular' => 'cents',
            'minorPlural'   => 'centi',
        ],
        'RUB' => [
            'mainSingular'  => 'rublis',
            'mainPlural'    => 'rubļi',
            'minorSingular' => 'kapeika',
            'minorPlural'   => 'kapeikas',
        ],
        'CZK' => [
            'mainSingular'  => 'krona',
            'mainPlural'    => 'krona',
            'minorSingular' => 'penijs',
            'minorPlural'   => 'peniji',
        ],
        'CAD' => [
            'mainSingular'  => 'dolārs',
            'mainPlural'    => 'dolāri',
            'minorSingular' => 'cents',
            'minorPlural'   => 'centi',
        ],
        'GBP' => [
            'mainSingular'  => 'mārciņa',
            'mainPlural'    => 'mārciņas',
            'minorSingular' => 'penijs',
            'minorPlural'   => 'peniji',
        ],
        'JPY' => [
            'mainSingular'  => 'jēna',
            'mainPlural'    => 'jēnas',
            'minorSingular' => 'sen', // @todo ???
            'minorPlural'   => 'sen', // @todo ???
        ],
        'BGN' => [
            'mainSingular'  => 'leva',
            'mainPlural'    => 'levas',
            'minorSingular' => 'stotinks',
            'minorPlural'   => 'stotinksi',
        ],
        'DKK' => [
            'mainSingular'  => 'krona',
            'mainPlural'    => 'krona',
            'minorSingular' => 'ēre',
            'minorPlural'   => 'ēres',
        ],
        'HUF' => [
            'mainSingular'  => 'forints',
            'mainPlural'    => 'forinti',
            'minorSingular' => 'fillers',
            'minorPlural'   => 'filleri',
        ],
        'PLN' => [
            'mainSingular'  => 'zlots',
            'mainPlural'    => 'zloti',
            'minorSingular' => 'grošs',
            'minorPlural'   => 'groši',
        ],
        'RON' => [
            'mainSingular'  => 'leja',
            'mainPlural'    => 'lejas',
            'minorSingular' => 'bans',
            'minorPlural'   => 'bani',
        ],
        'SEK' => [
            'mainSingular'  => 'krona',
            'mainPlural'    => 'krona',
            'minorSingular' => 'ēre',
            'minorPlural'   => 'ēres',
        ],
        'CHF' => [
            'mainSingular'  => 'franks',
            'mainPlural'    => 'franki',
            'minorSingular' => 'rapens',
            'minorPlural'   => 'rapeni',
        ],
        'ISK' => [
            'mainSingular'  => 'krona',
            'mainPlural'    => 'krona',
            'minorSingular' => 'eyrir', // @todo ???
            'minorPlural'   => 'aurar ', // @todo ???
        ],
        'NOK' => [
            'mainSingular'  => 'krona',
            'mainPlural'    => 'krona',
            'minorSingular' => 'ēre',
            'minorPlural'   => 'ēres',
        ],
        'HRK' => [
            'mainSingular'  => 'kuna',
            'mainPlural'    => 'kunas',
            'minorSingular' => 'lipa',
            'minorPlural'   => 'lipas',
        ],
        'TRY' => [
            'mainSingular'  => 'lira',
            'mainPlural'    => 'liras',
            'minorSingular' => 'kurus',
            'minorPlural'   => 'kuruši',
        ],
        'AUD' => [
            'mainSingular'  => 'dolārs',
            'mainPlural'    => 'dolāri',
            'minorSingular' => 'cents',
            'minorPlural'   => 'centi',
        ],
        'BRL' => [
            'mainSingular'  => 'reāls',
            'mainPlural'    => 'reāli',
            'minorSingular' => 'sentavo',
            'minorPlural'   => 'sentavo',
        ],
        'CNY' => [
            'mainSingular'  => 'juaņa',
            'mainPlural'    => 'juaņas',
            'minorSingular' => 'fens',
            'minorPlural'   => 'feni',
        ],
        'HKD' => [
            'mainSingular'  => 'dolārs',
            'mainPlural'    => 'dolāri',
            'minorSingular' => 'cents',
            'minorPlural'   => 'centi',
        ],
        'IDR' => [
            'mainSingular'  => 'rūpijs',
            'mainPlural'    => 'rūpiji',
            'minorSingular' => 'rūpijs', // ?????? no minor ?????
            'minorPlural'   => 'rūpiji', // ?????? no minor ?????
        ],
        'ILS' => [
            'mainSingular'  => 'šekels',
            'mainPlural'    => 'šekeļi',
            'minorSingular' => 'agors',
            'minorPlural'   => 'agoras',
        ],
        'INR' => [
            'mainSingular'  => 'rūpijs',
            'mainPlural'    => 'rūpiji',
            'minorSingular' => 'paise',
            'minorPlural'   => 'paises',
        ],
        'KRW' => [
            'mainSingular'  => 'vons',
            'mainPlural'    => 'vonas',
            'minorSingular' => 'jeon', // @todo ???
            'minorPlural'   => 'jeon',  // @todo ???
        ],
        'MXN' => [
            'mainSingular'  => 'peso',
            'mainPlural'    => 'peso',
            'minorSingular' => 'sentavo',
            'minorPlural'   => 'sentavo',
        ],
        'MYR' => [
            'mainSingular'  => 'ringits',
            'mainPlural'    => 'ringiti',
            'minorSingular' => 'sena',
            'minorPlural'   => 'senas',
        ],
        'NZD' => [
            'mainSingular'  => 'dolārs',
            'mainPlural'    => 'dolāri',
            'minorSingular' => 'cents',
            'minorPlural'   => 'centi',
        ],
        'PHP' => [
            'mainSingular'  => 'peso',
            'mainPlural'    => 'peso',
            'minorSingular' => 'sentavo',
            'minorPlural'   => 'sentavo',
        ],
        'SGD' => [
            'mainSingular'  => 'dolārs',
            'mainPlural'    => 'dolāri',
            'minorSingular' => 'cents',
            'minorPlural'   => 'centi',
        ],
        'THB' => [
            'mainSingular'  => 'bats',
            'mainPlural'    => 'bati',
            'minorSingular' => 'satanga',
            'minorPlural'   => 'satangas',
        ],
        'ZAR' => [
            'mainSingular'  => 'rands',
            'mainPlural'    => 'randi',
            'minorSingular' => 'cents',
            'minorPlural'   => 'centi',
        ]
    ];

    public static function toWords($num, $currency = 'EUR')
    {

        $num = number_format($num, 2, '.', '');
        $numParts = explode('.', $num);
        $lsString = '';

        //apstrādā centus
        if ($numParts[1] > 0) {
            $santString = self::tenWords($numParts[1]) .
                (($numParts[1] % 10 == 1 && $numParts[1] != 11) ? self::$currencies[$currency]['minorSingular'] : self::$currencies[$currency]['minorPlural']);
        } else {
            $santString = 'nulle ' . self::$currencies[$currency]['minorPlural'];
        }

        //apstrādā eiro

        $thousands = floor($numParts[0] / 1000);
        if (99 < $thousands) {
            return ('ERROR: Nevar konvertēt lielāku summu par 99 999.99');
        }

        if (!empty($thousands)) {
            $lsString = self::tenWords($thousands) .
                (($thousands % 10 == 1 && $thousands != 11) ? ' tūkstotis ' : 'tūkstoši ');
        }

        $hundreds = floor(substr($numParts[0], -3) / 100);

        if (!empty($hundreds)) {
            $lsString .= self::$numb[intval($hundreds)] .
                ($hundreds % 10 == 1 ? ' simts ' : ' simti ');
        }

        if (strlen($numParts[0]) == 1) {
            $tenLats = substr($numParts[0], -1);
        } else {
            $tenLats = substr($numParts[0], -2);
        }

        if ($tenLats > 0 || empty($lsString)) {
            $lsString .= self::tenWords($tenLats);
        }

        $lsString .= (($tenLats % 10 == 1 && $tenLats != 11) ? self::$currencies[$currency]['mainSingular'] : self::$currencies[$currency]['mainPlural']);

        return $lsString . ' ' . $santString;

    }

    public static function tenWords($num)
    {

        if ($num > 19) {
            $firstDigit = (int)$num / 10;
            $secondDigit = (int)$num % 10;
            if ($secondDigit == 0)
                return self::$tens[$firstDigit] . 'desmit ';
            else
                return self::$tens[$firstDigit] . 'desmit ' . self::$numb[$secondDigit] . ' ';
        } elseif ($num <= 19 AND $num > 10) {
            return self::$tens[$num % 10] . 'padsmit ';
        } elseif ($num <= 10) {
            return self::$numb[(int)$num] . ' ';
        }
    }
}
