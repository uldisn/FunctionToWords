<?php

use uldisn\FunctionToWords\FunctionToWords;

include 'FunctionToWords.php';

foreach([
    11,
    11.22,
    100.99,
    123.97,
    5555.55,
    66666.66,
    100000.66,
    1000000.66,
    10000000.66,
    100000000.66,
    100040005.77,
] as $d) {
 echo $d . ' = ' . FunctionToWords::toWords($d,'EUR') . PHP_EOL;
}