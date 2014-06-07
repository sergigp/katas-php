<?php

class AccentRemover implements Filter
{
    public function apply($words)
    {
        foreach($words as &$word) {

            $word = str_replace(["Á", "À", "Ä"], "A", $word);
            $word = str_replace(["É", "È", "Ë"], "E", $word);
            $word = str_replace(["Í", "Ì", "Ï"], "I", $word);
            $word = str_replace(["Ó", "Ò", "Ö"], "O", $word);
            $word = str_replace(["Ú", "Ù", "Ü"], "U", $word);
        }
        return $words;
    }
}
 