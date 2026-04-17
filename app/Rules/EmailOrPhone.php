<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class EmailOrPhone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL) && !isPhone($value)) {
            $fail('O campo deve ser um email ou número de telefone válido.');
        }
    }
}
