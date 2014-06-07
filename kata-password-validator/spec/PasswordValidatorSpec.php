<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PasswordValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PasswordValidator');
    }

    public function it_should_refuse_a_password_with_less_than_six_characters_length()
    {
        $this->isValid("_Ab3c")->shouldBe(false);
    }

    public function it_should_accept_a_valid_password()
    {
        $this->isValid("_Ab3cc")->shouldBe(true);
    }

    public function it_should_refuse_a_password_without_underscore()
    {
        $this->isValid("cAb3cc")->shouldBe(false);
    }

    public function it_should_refuse_a_password_without_any_capital_letter()
    {
        $this->isValid("_ab3cc")->shouldBe(false);
    }

    public function it_should_refuse_a_password_without_any_lower_case_letter()
    {
        $this->isValid("_AB3CC")->shouldBe(false);
    }

    public function it_should_refuse_a_password_without_any_number()
    {
        $this->isValid("_Abccc")->shouldBe(false);
    }
}
