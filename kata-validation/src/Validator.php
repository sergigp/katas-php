<?php
 /**
 * 
 *
 * @author: sergi gonzalez
 * @email:  sergigp85@gmail.com
 */

class Validator
{
    private static $validationFunctions = array(
        'I' =>  'validateInt',
        'S' =>  'validateString'
    );

    public function isValid($value, $type, $charCount = null)
    {
        $isCountValid = !is_null($charCount) ? strlen($value) == $charCount : true;
        $validationFunction = self::$validationFunctions[$type];

        return $this->$validationFunction($value) && $isCountValid;
    }

    private function validateInt($value)
    {
        return is_int($value);
    }

    private function validateString($value)
    {
        return is_string($value);
    }
}