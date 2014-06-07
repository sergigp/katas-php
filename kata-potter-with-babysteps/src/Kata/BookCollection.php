<?php namespace Kata;

class BookCollection 
{
    private $numItems = 0;
    private $title;
    private $price;

    function __construct($title, $numItems, $price)
    {
        $this->numItems = $numItems;
        $this->price = (int) $price;
        $this->title = (int) $title;
    }

    public function getTotalPrice()
    {
        return $this->price * $this->numItems;
    }

    /**
     * @return int
     */
    public function getNumItems()
    {
        return $this->numItems;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}
 