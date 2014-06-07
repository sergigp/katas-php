<?php

class VectorCalculatorTest extends PHPUnit_Framework_TestCase
{
    private $vectorCalculator;

    public function setUp()
    {
        $this->vectorCalculator = new VectorCalculator();
    }


    /**
     * @dataProvider modulusProvider
     */
    public function testModulus($vector, $modulus)
    {
        $this->assertEquals($modulus, $this->vectorCalculator->getModulus($vector));
    }

    /**
     * @dataProvider orthogonalProvider
     */
    public function testOrthogonality($vector1, $vector2, $isPerpendicular)
    {
        $this->assertEquals($this->vectorCalculator->isOrthogonal($vector1, $vector2), $isPerpendicular);
    }



    public function modulusProvider()
    {
        return [
            array([0, 0], 0),
            array([1, 0], 1),
            array([1, 1], sqrt(2)),
            array([5, 0], 5),
            array([5, 1], sqrt(26)),
        ];
    }

    public function orthogonalProvider()
    {
        return [
            array([-4, 3], [9, 12], true),
            array([0, 0], [3, 0], true),
            array([3, 0], [5, 5], false),
            array([2, -3], [-4, 2], false),
            array([3, 1], [1, -3], true),
        ];
    }
}
 