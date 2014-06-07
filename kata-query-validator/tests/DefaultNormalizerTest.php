<?php

class DefaultNormalizerTest extends PHPUnit_Framework_TestCase
{
    private $filter;

    public function setUp()
    {
        $this->filter = QueryNormalizerFactory::newDefaultQueryNormalizer();
    }

    private function applyFilters($input)
    {
        return  $this->filter->apply($input);
    }

    public function test_input_with_single_word_is_converted_to_list_of_single_word()
    {

        $result = $this->applyFilters("FONTANERO");
        $this->assertEquals(["FONTANERO"], $result);
        $this->assertEquals(1, count($result));
    }

    public function test_input_lower_case_is_converted_to_upper_case()
    {
        $result = $this->applyFilters("lampista");
        $this->assertEquals(["LAMPISTA"], $result);
    }

    public function test_input_sentence_is_converted_to_list_of_words()
    {
        $result = $this->applyFilters("FONTANERO LAMPISTA");
        $this->assertEquals(["FONTANERO","LAMPISTA"], $result);
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

    /**
     * @dataProvider alternateCharsProvider
     */
    public function test_input_with_alternate_chars_should_be_cleaned($input, $expected)
    {
        $result = $this->applyFilters($input);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider prepositionsProvider
     */
    public function test_input_with_prepositions_should_be_cleaned($input, $expected)
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
            ["FONTANEROS", ["FONTANERO"]],
            ["PLANTAS",["PLANTA"]],
            ["JUGUETES", ["JUGUETE"]],
        ];
    }

    public function articlesProvider()
    {
        return [
            ['EL PERRO', ["PERRO"]],
            ['LA PERRA', ["PERRA"]],
            ['LAS PERRAS', ["PERRA"]],
            ['LOS PERROS', ["PERRO"]],
        ];
    }

    public function alternateCharsProvider()
    {
        return [
            ['FONTANERÓ', ["FONTANERO"]],
            ['FÓNTANERÁ', ["FONTANERA"]],
        ];
    }

    public function prepositionsProvider()
    {
        return [
            ["HACIA ABAJO", ["ABAJO"]],
            ["PARA ABAJO", ["ABAJO"]],
            ["DESDE AYER", ["AYER"]],
        ];
    }
}
