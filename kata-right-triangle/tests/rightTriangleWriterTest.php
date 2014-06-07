<?php

class rightTriangleWriterTest extends PHPUnit_Framework_TestCase
{
    public $writer;

    public function setUp()
    {
        $this->writer = new rightTriangleWriter();
    }
    /**
     * @dataProvider sideProvider
     */
    public function testDrawing($side, $result)
    {
        $this->writer->setSide($side);
        $this->assertEquals($this->writer->writeTriangle(), $result);
    }

    public function testCantGetTriangleZeroSide()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->writer->setSide(0);
        $this->writer->writeTriangle();
    }

    public function testCantGetTriangleCantBeNegative()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->writer->setSide(-1);
        $this->writer->writeTriangle();
    }

    public function sideProvider()
    {
        return array(
          array(1, "X"),
          array(2, "X\nXX"),
          array(3, "X\nXX\nXXX"),
          array(10, "X\nXX\nXXX\nXXXX\nXXXXX\nXXXXXX\nXXXXXXX\nXXXXXXXX\nXXXXXXXXX\nXXXXXXXXXX")
        );
    }
}
