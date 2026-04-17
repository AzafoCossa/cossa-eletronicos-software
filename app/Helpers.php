<?php

if(!function_exists("isPhone")){
    /**
     * Check if the given value is a valid phone number.
     */
    function isPhone(string $value): bool
    {
        return preg_match('/^(\+258)?(8[2-7])[0-9]{7}$/', $value) === 1;
    }
}