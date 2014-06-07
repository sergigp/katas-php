<?php

class DuplicateNRemover implements Filter
{
    public function apply($words)
    {
        foreach($words as &$word) {
            $word = str_replace(["NN"], "N", $word);
        }
        return $words;
    }
}
 