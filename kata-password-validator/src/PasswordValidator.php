<?php

class PasswordValidator
{

    public function isValid($password)
    {
        return $this->isLongEnough($password) &&
                $this->containsAtLeastOneUnderscore($password) &&
                $this->containsAtLeastOneCapitalLetter($password) &&
                $this->containsAtLeastOneLowerCaseLetter($password) &&
                $this->containsAtLeastOneNumber($password);
    }

    /**
     * @param $password
     * @return bool
     */
    private function isLongEnough($password)
    {
        return strlen($password) >= 6;
    }

    /**
     * @param $password
     * @return bool
     */
    private function containsAtLeastOneUnderscore($password)
    {
        return strpos($password, "_") !== false;
    }

    /**
     * @param $password
     * @return bool
     */
    private function containsAtLeastOneCapitalLetter($password)
    {
        return $this->any($password, function($char) {
            return ord($char) > 64 && ord($char) < 91;
        });
    }

    private function containsAtLeastOneLowerCaseLetter($password)
    {
        return $this->any($password, function($char) {
            return ord($char) > 96 && ord($char) < 123;
        });
    }

    private function containsAtLeastOneNumber($password)
    {
        return $this->any($password, function($char) {
            return ord($char) > 47 && ord($char) < 58;
        });
    }

    private function any($password, $predicate) {

        for ($i = 0; $i < strlen($password); $i++) {
            if ($predicate($password[$i])) {
                return true;
            }
        }
        return false;
    }



}
