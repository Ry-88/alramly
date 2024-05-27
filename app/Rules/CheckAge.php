<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CheckAge implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $birth_date;
    public function __construct($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {


        $age = Carbon::parse($this->birth_date)->diff(Carbon::now())->y;
        return $age >= 18;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'age must be greater than 18';
    }
}
