<?php

class SquareDetector
{
    private $coords = [];
    private $vectors;
    private $vectorCalculator;
    private $vectorGenerator;

    public function __construct()
    {
        $this->vectorCalculator = new VectorCalculator();
        $this->vectorGenerator = new VectorGenerator();
    }

    public function setCoords($coords)
    {
        $this->coords = $coords;
    }

    public function isSquare()
    {
        $this->vectors = $this->getVectorsFromPoints();

        return $this->haveAllVectorsSameModulus() && $this->areAllVectorsOrthogonal();
    }


    private function getVectorsFromPoints()
    {
        for ($i = 0; $i < 4; $i++) {
            $nextPointIndex = $i == 3 ? 0 : $i + 1;
            $this->vectorGenerator->setPoint1($this->coords[$i]);
            $this->vectorGenerator->setPoint2($this->coords[$nextPointIndex]);

            $vectors[] = $this->vectorGenerator->getVector();
        }

        return $vectors;
    }

    private function haveAllVectorsSameModulus()
    {
        foreach ($this->vectors as $vector) {
            $modulus[] = $this->vectorCalculator->getModulus($vector);
        }

        if (count(array_unique($modulus)) != 1) {
            return false;
        }

        return true;
    }

    private function areAllVectorsOrthogonal()
    {
        for ($i = 0; $i < 4; $i++) {
            $nextVectorIndex = $i == 3 ? 0 : $i + 1;

            if (!$this->vectorCalculator->isOrthogonal($this->vectors[$i], $this->vectors[$nextVectorIndex])) {
                return false;
            }
        }

        return true;
    }

}
