<?php


class EratostenesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider limitNumberResultProvider
     */
    public function testsieve($limitNumber, $expectedResult)
    {
        $eratostenes = new Eratostenes($limitNumber);
        $result = $eratostenes->sieve();
        $this->assertEquals($result, $expectedResult);
    }

    /**
     * @dataProvider invalidArgumentsProvider
     */
    public function testInvalidArgument($limitNumber)
    {
        $this->setExpectedException('InvalidArgumentException');
        $eratostenes = new Eratostenes($limitNumber);
    }

    public function limitNumberResultProvider()
    {
        return array(
            array(2, array(2)),
            array(3, array(2, 3)),
            array(5, array(2, 3, 5)),
            array(7, array(2, 3, 5, 7)),
            array(11, array(2, 3, 5, 7, 11)),
            array(20, array(2, 3, 5, 7, 11, 13, 17, 19)),
            array(30, array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29)),
            array(105, array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89,
                97, 101, 103)),
            array(380, array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83,
                89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193,
                197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313,
                317, 331, 337, 347, 349, 353, 359, 367, 373, 379
            ))
        );
    }

    public function invalidArgumentsProvider()
    {
        return array(
            array('a'),
            array(array()),
            array(false),
            array(1.2),
            array(1),
        );
    }
}
