<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class PhoneExistsForPasswordReset implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $phoneExists = DB::table('users')->where('phone', $value)->exists();

        if (!$phoneExists) {
            $fail('আপনার নম্বরটি দিয়ে কোনো রেজিস্ট্রেশন ছিল না');
        }
    }
}
