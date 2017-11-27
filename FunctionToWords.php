<?php
namespace uldisn\FunctionToWords;
class FunctionToWords
{

    private static $numb = ['nulle', 'viens', 'divi', 'trīs', 'četri', 'pieci', 'seši', 'septiņi', 'astoņi', 'deviņi', 'desmit'];
    private static $tens = ['', 'vien', 'div', 'trīs', 'četr', 'piec', 'seš', 'septiņ', 'astoņ', 'deviņ'];
    private static $bigones = [100 => 'simti', 1000 => 'tūkstoši', 1000000 => 'miljoni', 1000000000 => 'miljardi'];

    public static function toWords($num)
    {

        $num = number_format($num, 2, '.', '');
        $numParts = explode('.', $num);
        $lsString = '';

        //apstrādā centus
        if ($numParts[1] > 0) {
            $santString = self::tenWords($numParts[1]) .
                (($numParts[1] % 10 == 1 && $numParts[1] != 11) ? 'cents ' : 'centi ');
        } else {
            $santString = 'nulle centi';
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

        $lsString .= 'eiro';

        return $lsString . ' ' . $santString;

    }

    public static function tenWords($num)
    {

        if ($num > 19) {
            $firstDigit = $num[0];
            $secondDigit = $num[1];
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
