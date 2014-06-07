<?php

namespace RomanNumeralKata;

class RomanEncoder
{
    private static $arabicMap = [
        1000    => 'm',
        900     => 'cm',
        500     => 'd',
        400     => 'cd',
        100     => 'c',
        90      => 'xc',
        50      => 'l',
        40      => 'xl',
        10      => 'x',
        9       => 'ix',
        5       => 'v',
        4       => 'iv',
        1       => 'i'
    ];

    public function fromArabic($arabicNumber)
    {
        $romanNumeral = '';

        foreach (self::$arabicMap as $arabic => $roman) {
            while ($arabicNumber >= $arabic) {
                $romanNumeral .= $roman;
                $arabicNumber -= $arabic;
            }
        }

        return $romanNumeral;
    }
}
