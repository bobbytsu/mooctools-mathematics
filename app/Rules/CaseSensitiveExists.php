<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CaseSensitiveExists implements Rule
{
    public function passes($attribute, $value)
    {
        return DB::table('users')
            ->whereRaw("BINARY username = ?", [$value])
            ->exists();
    }

    public function message()
    {
        return 'Incorrect Username';
    }
}
