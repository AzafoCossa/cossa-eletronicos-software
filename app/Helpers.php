<?php

use Illuminate\Support\Str;

if(!function_exists("isPhone")){
    /**
     * Check if the given value is a valid phone number.
     */
    function isPhone(string $value): bool
    {
        return preg_match('/^(\+258)?(8[2-7])[0-9]{7}$/', $value) === 1;
    }
}

if(!function_exists("addPhonePrefix")){
    function addPhonePrefix($value){
        $prefix = '+258';

        if (substr($value, 0, strlen($prefix)) !== $prefix) {
            return $prefix . $value;
        }

        return $value;
    }
}

if(!function_exists("isEmail")){
    function isEmail(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}

if(!function_exists('transformString')){
    function transformString(String $value, $n = 120)
    {
        if ($n) {
            return Str::length($value) > $n ? Str::substr($value, 0, $n - 1) . "..." : $value;
        }
    }
}