<?php
namespace uldisn\FunctionToWords;
class FunctionToWords
{

    private static array $numb = ['nulle', 'viens', 'divi', 'trīs', 'četri', 'pieci', 'seši', 'septiņi', 'astoņi', 'deviņi', 'desmit'];
    private static array $tens = ['', 'vien', 'div', 'trīs', 'četr', 'piec', 'seš', 'septiņ', 'astoņ', 'deviņ'];

    private static array $currencies = [
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

    public static function toWords($num, $currency = 'EUR'): string
    {

        $num = number_format($num, 2, '.', '');
        [$intergers, $decimals] = explode('.', $num);

        $currencyName = self::$currencies[$currency];

        $integerParts = str_split(substr('000000000' . $intergers, -9), 3);
        $integerParts = array_reverse($integerParts);

        $r = '';

        /** miljoni */
        if ((int)$integerParts[2]) {
            $r .= self::hundredToWords($integerParts[2]) .
                ' ' . (self::isSngular($integerParts[2]) ? 'miljons' : 'miljoni') .
                ' ';
        }

        /** tukstoši */
        if ((int)$integerParts[1]) {
            $r .= self::hundredToWords($integerParts[1]) .
                ' ' .
                (self::isSngular($integerParts[1]) ? 'tūkstotis' : 'tūkstoši') .
                ' ';
        }
        $r .= self::hundredToWords($integerParts[0])
            . ' '
            . (self::isSngular($integerParts[0]) ? $currencyName['mainSingular'] : $currencyName['mainPlural'])
            . ' ';

        /** decimali */
        $decimals = (int)$decimals;
        if ($decimals > 0) {
            $r .= ' ' . self::tenWords($decimals) .
                ' ' .
                (self::isSngular($decimals) ? $currencyName['minorSingular'] : $currencyName['minorPlural']);
        } else {
            $r .= ' nulle ' . $currencyName['minorPlural'];
        }

        return $r;

    }

    public static function tenWords(int $num): string
    {

        if ($num > 19) {
            $firstDigit = $num / 10;
            $secondDigit = $num % 10;
            if ($secondDigit === 0) {
                return self::$tens[$firstDigit] . 'desmit';
            }
            return self::$tens[$firstDigit] . 'desmit ' . self::$numb[$secondDigit];

        }
        if ($num > 10) {
            return self::$tens[$num % 10] . 'padsmit';
        }
        //$num <= 10
        return self::$numb[$num];

    }

    /**
     * @param string $number
     * @return string
     */
    private static function hundredToWords(string $number): string
    {
        $list = [];
        if ($number[0] !== '0') {
            $list[] = self::$numb[(int)$number[0]];
            $list[] = $number[0] === '1'  ? 'simts' : 'simti';
        }
        $tens = (int)substr('0' . $number,-2);
        if ($tens > 0 || !$list) {
            $list[] = self::tenWords($tens);
        }
        return implode(' ', $list);
    }

    public static function isSngular(string $number): bool
    {
        if (substr($number, -3) === '100') {
            return true;
        }
        if (substr($number, -1) !== '1') {
            return false;
        }
        if (substr($number, -2) === '11') {
            return false;
        }


        return true;
    }
}
