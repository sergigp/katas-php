<?php

class VectorGenerator 
{
    private $point1;
    private $point2;

    public function getVector()
    {
        if (is_null($this->point1) || is_null($this->point2)) {
            throw new \Exception('Points are not set');
        }

        return array($this->point2[0] - $this->point1[0], $this->point2[1] - $this->point1[1]);
    }

    public function setPoint1($point1)
    {
        if (!is_array($point1) || count($point1) != 2) {
            throw new \InvalidArgumentException();
        }

        $this->point1 = $point1;
        return $this;
    }

    public function getPoint1()
    {
        return $this->point1;
    }

    public function setPoint2($point2)
    {
        if (!is_array($point2) || count($point2) != 2) {
            throw new \InvalidArgumentException();
        }

        $this->point2 = $point2;
        return $this;
    }

    public function getPoint2()
    {
        return $this->point2;
    }

}
 