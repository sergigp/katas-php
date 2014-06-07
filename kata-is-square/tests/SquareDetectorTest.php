<?php

class SquareDetectorTest extends PHPUnit_Framework_TestCase
{
    private $squareDetector;
    
    public function setup()
    {
        $this->squareDetector = new SquareDetector();
    }

    /**
     * @dataProvider squaresProvider
     */
    public function testSquares($coords, $isSquare)
    {
        $this->squareDetector->setCoords($coords);

        $this->assertEquals($isSquare, $this->squareDetector->isSquare());
    }



    public function squaresProvider()
    {
        return [
            [array([0, 0], [0, 1], [1, 1], [1, 0]), true],
            [array([0, 0], [0, 2], [2, 2], [2, 0]), true],
            [array([0, 0], [2, 1], [3, -1], [1, -2]), true],
            [array([0, 0], [0, 3], [3, 3], [3, 0]), true],
            [array([0, 0], [0, 2], [3, 2], [3, 0]), false],
            [array([0, 0], [3, 4], [8, 4], [5, 0]), false],
            [array([0, 0], [0, 0], [1, 1], [3, 0]), false],
        ];
    }


}
