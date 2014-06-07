<?php

class QueryNormalizer
{

    private $filters = [];

    public function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    public function apply($input)
    {
        $words = $this->splitWords(strtoupper($input));

        foreach ($this->filters as $filter) {
            $words = $filter->apply($words);
        }

        return $words;
    }

    private function splitWords($input)
    {
        return explode(" ", $input);
    }

}
 