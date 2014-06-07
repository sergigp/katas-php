<?php

require_once __DIR__.'/../vendor/autoload.php';

 /**
 * 
 *
 * @author: sergi gonzalez
 * @email:  sergigp85@gmail.com
 */

class ValidatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->validator = new Validator();
    }

    /**
     * @dataProvider stringProvider
     */
    public function testIsString($value, $expected)
    {
        $result = $this->validator->isValid($value, "S");
        $this->assertTrue($result === $expected);
    }

    /**
     * @dataProvider intProvider
     */
    public function testIsInt($value, $expected)
    {
        $result = $this->validator->isValid($value, "I");
        $this->assertTrue($result === $expected);
    }


    /**
     * @dataProvider intCountProvider
     */
    public function testIntCount($value, $count, $expectedResult)
    {
        $result = $this->validator->isValid($value, "I", $count);
        $this->assertTrue($result === $expectedResult);
    }

    /**
     * @dataProvider stringCountProvider
     */
    public function testStringCount($value, $count, $expectedResult)
    {
        $result = $this->validator->isValid($value, "S", $count);
        $this->assertTrue($result === $expectedResult);
    }

    public function stringProvider()
    {
        return array(
          array('1', true),
          array(1, false),
          array('a', true),
          array('aaaaaa', true),
          array('', true),
          array(1000, false),
        );
    }

    public function intProvider()
    {
        return array(
            array(1, true),
            array('a', false),
            array('1', false),
            array(123, true),
            array(0, true),
            array(-23, true),
            array('aa', false),
            array('', false),
        );
    }

    public function intCountProvider()
    {
        return array(
            array(1, 1, true),
            array(12, 2, true),
            array(0, 1, true),
            array(123, 3, true),
            array(1, 5, false),
            array(12, 7, false),
            array(0, 15, false),
            array(123, 1, false),
        );
    }

    public function stringCountProvider()
    {
        return array(
            array('a', 1, true),
            array('aa', 2, true),
            array('', 0, true),
            array('a', 0, false),
            array('aa', 3, false),
        );
    }

}