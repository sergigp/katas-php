<?php

class BlacklistFilter implements Filter
{
    private $blackList = [];

    public function __construct(array $blackList)
    {
        $this->blackList = $blackList;
    }

    public function apply($input)
    {
        $input = (array) $input;

        $result = [];

        foreach ($input as $word) {
            if (!in_array($word, $this->blackList)) {
                $result[] = $word;
            }
        }

        return $result;
    }

}
 