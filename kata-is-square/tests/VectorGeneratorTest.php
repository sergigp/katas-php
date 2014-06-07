<?php

class VectorGeneratorTest extends PHPUnit_Framework_TestCase
{
    private $vectorGenerator;

    public function setUp()
    {
        $this->vectorGenerator = new VectorGenerator();
    }

    /**
     * @dataProvider vectorProvider
     */
    public function testGetVector($point1, $point2, $vector)
    {
        $this->vectorGenerator
            ->setPoint1($point1)
            ->setPoint2($point2);

        $this->assertEquals($vector, $this->vectorGenerator->getVector());
    }

    /**
     * @dataProvider invalidPointsProvider
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentPoints($point1, $point2)
    {
        $this->vectorGenerator
            ->setPoint1($point1)
            ->setPoint2($point2);
    }

    public function vectorProvider()
    {
        return [
            array([0, 0], [1, 0], [1, 0]),
            array([0, 0], [2, 0], [2, 0]),
            array([1, 1], [1, 0], [0, -1]),
            array([-1, -1], [1, 0], [2, 1]),
            array([0, -5], [5, 0], [5, 5]),
            array([0, -5], [-1, 10], [-1, 15]),
        ];
    }

    public function invalidPointsProvider()
    {
        return [
            array(1, 2),
            array([1, 2, 3], [1, 2, 3]),
            array('b', 'a'),
        ];
    }

}
 