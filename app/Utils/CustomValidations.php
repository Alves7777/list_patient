<?php

namespace App\Utils;

class CustomValidations
{
    public static function cpf($attribute, $value, $parameters, $validator)
    {
        $cpfOnlyNumber = self::stringToNumber($value);

        if (strlen($cpfOnlyNumber) != 11) {
            return false;
        }
        return true;
    }

    public static function stringToNumber($input)
    {
        return preg_replace("/[^0-9]/", "", $input);
    }
}
