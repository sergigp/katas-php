<?php


class rightTriangleWriter
{
    private $side = 0;

    const END_LINE = "\n";

    public function setSide($side)
    {
        if ($side < 1) throw new InvalidArgumentException();
        $this->side = $side;
    }

    public function writeTriangle()
    {
        $triangle = "";
        for ($i = 1; $i <= $this->side; $i++) {
            $triangle .= str_repeat("X", $i) . self::END_LINE;
        }

        return substr($triangle, 0, - (strlen(self::END_LINE))) ;
    }
}