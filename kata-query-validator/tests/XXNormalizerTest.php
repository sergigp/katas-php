<?php

class XXNormalizerTest extends PHPUnit_Framework_TestCase
{
    private $filter;

    public function setUp()
    {
        $this->filter = QueryNormalizerFactory::newQueryNormalizer("XX");
    }

    private function applyFilters($input)
    {
        return  $this->filter->apply($input);
    }

    public function test_input_with_single_word_is_converted_to_list_of_single_word()
    {
        $result = $this->applyFilters("FONTANERO");
        $this->assertArrayIsSame(["FONTANERO"], $result);
    }

    public function assertArrayIsSame($array, $result) {

        $this->assertEquals(sort($array), sort($result));
    }

    public function test_input_lower_case_is_converted_to_upper_case()
    {
        $result = $this->applyFilters("lampista");
        $this->assertEquals(["LAMPISTA"], $result);
    }

    public function test_input_sentence_is_converted_to_list_of_words()
    {
        $result = $this->applyFilters("FONTANERO LAMPISTA");
        //TODO Comprobar que el array contiene el elemento para no depender
        $this->assertEquals(["FONTANERO","LAMPISTA"], $result);
    }

    public function test_input_with_double_n_is_replaced_by_one_n()
    {
        $result = $this->applyFilters("FONNTANERO");
        $this->assertEquals(["FONTANERO"], $result);
    }

    /**
     * @dataProvider pluralsProvider
     */
    public function test_input_plural_word_is_converted_to_singular($input, $expected)
    {
        $result = $this->applyFilters($input);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider articlesProvider
     */
    public function test_input_with_articles_should_be_cleaned($input, $expected)
    {
        $result = $this->applyFilters($input);
        $this->assertEquals($expected, $result);
    }

    public function test_empty_query()
    {
        $result = $this->applyFilters("");
        $this->assertEquals([""], $result);
    }

    public function test_null_query()
    {
        $result = $this->applyFilters(null);
        $this->assertEquals([""], $result);
    }

    public function pluralsProvider()
    {
        return [
            ["FONTANEROX", ["FONTANERO"]],
            ["PLANTAX",["PLANTA"]],
            ["JUGUETEX", ["JUGUETE"]],
        ];
    }

    public function articlesProvider()
    {
        return [
            ["XX PERRO", ["PERRO"]],
        ];
    }
}
