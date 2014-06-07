<?php

class VectorCalculator 
{
    public function getModulus($vector)
    {
        if (!is_array($vector) || count($vector) != 2) {
            throw new \InvalidArgumentException();
        }

        return sqrt(pow($vector[0], 2) + pow($vector[1], 2));
    }

    public function isOrthogonal($vector1, $vector2)
    {
        if ((!is_array($vector1) || count($vector1) != 2) && (!is_array($vector2) || count($vector2) != 2)) {
            throw new \InvalidArgumentException();
        }

        $cartesianProduct = $vector1[0] * $vector2[0] + $vector1[1] * $vector2[1];

        return $cartesianProduct === 0;
    }

}
 