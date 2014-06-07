<?php

namespace spec\RomanNumeralKata;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanEncoderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RomanNumeralKata\RomanEncoder');
    }

    public function it_should_return_empty_string_for_zero()
    {
        $this->fromArabic(0)->shouldReturn('');
    }

    public function it_should_encode_to_single_numerals()
    {
        $this->fromArabic(1000)->shouldReturn('m');
        $this->fromArabic(500)->shouldReturn('d');
        $this->fromArabic(100)->shouldReturn('c');
        $this->fromArabic(50)->shouldReturn('l');
        $this->fromArabic(10)->shouldReturn('x');
        $this->fromArabic(1)->shouldReturn('i');
    }


    public function it_should_encode_with_multiple_numerals()
    {
        $this->fromArabic(2)->shouldReturn('ii');
        $this->fromArabic(3)->shouldReturn('iii');
        $this->fromArabic(4)->shouldReturn('iv');
        $this->fromArabic(9)->shouldReturn('ix');
        $this->fromArabic(90)->shouldReturn('xc');
        $this->fromArabic(40)->shouldReturn('xl');
        $this->fromArabic(43)->shouldReturn('xliii');
        $this->fromArabic(400)->shouldReturn('cd');
        $this->fromArabic(900)->shouldReturn('cm');
        $this->fromArabic(445)->shouldReturn('cdxlv');
    }

}
