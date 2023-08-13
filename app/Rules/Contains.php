<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Contains implements ValidationRule
{
    public function __construct(protected string $needle)
    {

    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_array($value) && ! in_array($this->needle, $value)) {
            $fail("The :attribute must contain {$this->needle}");
        }

        if (is_string($value) && ! str_contains($value, $this->needle)) {
            $fail("The :attribute must contain {$this->needle}");
        }
    }
}
