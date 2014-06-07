<?php

use Kata\BookCollection;

class BookCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider examplesProvider
     */
    public function it_should_get_total_price_multiplying_the_price_of_one_book_by_its_quantity($title, $numItems, $price)
    {
        $bookCollection = new BookCollection($title, $numItems, $price);
        $this->assertEquals($numItems * $price, $bookCollection->getTotalPrice());
    }

    public function examplesProvider()
    {
        return [
            ['title1', 1, 10],
            ['title1', 2, 10],
            ['title1', 3, 30]
        ];
    }

}
 