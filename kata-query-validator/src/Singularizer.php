<?php
class Singularizer implements Filter
{
    private $pluralSufixes = [];

    public function __construct($pluralSufixes) {
        $this->pluralSufixes = $pluralSufixes;
    }

    public function apply($words)
    {
        $words = (array) $words;
        $result = [];
        foreach ($words as $word) {

            if (strpos($word, $this->getPluralSuffix()) + 1 == strlen($word)) {
                $word = substr_replace($word, '', strpos($word, $this->getPluralSuffix()), strlen($word));
            }
            $result[] = $word;
        }
        return $result;
    }

    public function getPluralSuffix() {
        return $this->pluralSufixes[0];
    }
}
