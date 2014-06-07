<?php namespace Kata;

class PotterCalculator 
{
    private $cart = [];

    public function add($bookCollection)
    {
        $this->cart[] = $bookCollection;
    }

    public function getTotalPrice()
    {
        return $this->getTotalPriceWithoutDiscount() * $this->getDisctountMultiplier();
    }

    /**
     * @return float|int
     */
    private function getDisctountMultiplier()
    {
        switch (count($this->cart)) {
            case 2:
                return 0.95;
            case 3:
                return 0.90;
            case 4:
                return 0.85;
            case 5:
                return 0.75;
            default:
                return 1;
        }
    }

    /**
     * @param $totalPrice
     * @return mixed
     */
    private function getTotalPriceWithoutDiscount()
    {
        $totalPrice = 0;

        foreach ($this->cart as $bookCollection) {
            $totalPrice += $bookCollection->getTotalPrice();
        }
        return $totalPrice;
    }
}
 