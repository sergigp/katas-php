<?php

use Kata\PotterCalculator;
use Kata\Book;
use Mockery as m;

class PotterCalculatorTest extends PHPUnit_Framework_TestCase
{
    const PRICE_PER_BOOK = 8;
    private $potterCalculator;

    public function setUp()
    {
        $this->potterCalculator = $potterCalculator = new PotterCalculator();
    }

    /** @test **/
    public function it_should_get_price_of_one_book()
    {
        $numItems = 1;
        $bookCollection = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);

        $this->potterCalculator->add($bookCollection);
        $this->assertEquals(self::PRICE_PER_BOOK, $this->potterCalculator->getTotalPrice());
    }
    
    /** @test **/
    public function it_should_get_price_for_more_than_one_book_with_the_same_title()
    {
        $numItemsInCollection = 2;
        $bookCollection = $this->getBookCollectionMock($numItemsInCollection, self::PRICE_PER_BOOK);

        $this->potterCalculator->add($bookCollection);
        $this->assertEquals($numItemsInCollection * self::PRICE_PER_BOOK, $this->potterCalculator->getTotalPrice());
    }

    /** @test **/
    public function it_should_get_a_discount_with_two_different_collections()
    {
        $numItems = 2;
        $bookCollection = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection2 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);

        $this->potterCalculator->add($bookCollection);
        $this->potterCalculator->add($bookCollection2);

        $this->assertEquals(4 * self::PRICE_PER_BOOK * 0.95, $this->potterCalculator->getTotalPrice());
    }
    
    /** @test **/
    public function it_should_get_discount_with_three_different_collections()
    {
        $numItems = 1;
        $bookCollection = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection2 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection3 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);

        $this->potterCalculator->add($bookCollection);
        $this->potterCalculator->add($bookCollection2);
        $this->potterCalculator->add($bookCollection3);

        $this->assertEquals(3 * self::PRICE_PER_BOOK * 0.90, $this->potterCalculator->getTotalPrice());
    }

    /** @test **/
    public function it_should_get_discount_with_four_different_collections()
    {
        $numItems = 1;
        $bookCollection = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection2 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection3 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection4 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);

        $this->potterCalculator->add($bookCollection);
        $this->potterCalculator->add($bookCollection2);
        $this->potterCalculator->add($bookCollection3);
        $this->potterCalculator->add($bookCollection4);

        $this->assertEquals(4 * self::PRICE_PER_BOOK * 0.85, $this->potterCalculator->getTotalPrice());
    }

    /** @test **/
    public function it_should_get_discount_with_five_different_collections()
    {
        $numItems = 1;
        $bookCollection = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection2 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection3 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection4 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);
        $bookCollection5 = $this->getBookCollectionMock($numItems, self::PRICE_PER_BOOK);

        $this->potterCalculator->add($bookCollection);
        $this->potterCalculator->add($bookCollection2);
        $this->potterCalculator->add($bookCollection3);
        $this->potterCalculator->add($bookCollection4);
        $this->potterCalculator->add($bookCollection5);

        $this->assertEquals(5 * self::PRICE_PER_BOOK * 0.75, $this->potterCalculator->getTotalPrice());
    }


    private function getBookCollectionMock($numItems, $pricePerBook)
    {
        $bookCollection = m::mock('BookCollection');
        $bookCollection->shouldReceive('getTotalPrice')->andReturn($numItems * $pricePerBook);

        return $bookCollection;
    }

    public function tearDown()
    {
        m::close();
    }
}
