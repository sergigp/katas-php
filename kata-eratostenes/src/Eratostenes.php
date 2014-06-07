<?php

class Eratostenes
{
    private $limitNumber;

    public function __construct($limitNumber)
    {
        if (!is_int($limitNumber) || $limitNumber < 2) throw new InvalidArgumentException();
        $this->limitNumber = $limitNumber;
    }

    public function sieve()
    {
        $listNumbers = range(0, $this->limitNumber);

        unset($listNumbers[0]);
        unset($listNumbers[1]);

        for ($possiblePrimeNumber = 2; $possiblePrimeNumber <= $this->limitNumber; $possiblePrimeNumber++) {
            if (in_array($possiblePrimeNumber, $listNumbers)){
                $listPrimeNumbers[] = $possiblePrimeNumber;
                $this->unsetMultiplesOfNumber($possiblePrimeNumber, $listNumbers);
            }
        }

        return $listPrimeNumbers;
    }

    /**
     * @param $limitMaxMultiplier
     * @param $listNumbers
     * @param $multiplier
     */
    private function unsetMultiplesOfNumber($posiblePrimeNumber, &$listNumbers)
    {
        $limitMaxMultiplier = floor($this->limitNumber / $posiblePrimeNumber);

        for ($x = 1; $x <= $limitMaxMultiplier; $x++) {
            $listNumbers[$x * $posiblePrimeNumber] = false;
        }
    }
}
