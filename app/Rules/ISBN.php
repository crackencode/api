<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ISBN implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Como el regexp no valida el ISBN con "-" los eliminamos
        $isbn = str_replace("-", "", $value);

        // Expresion regular para ISBN
        // Se puede cambiar a expresiones mas concretas
        $regex = '/^(97(8|9))?\d{9}(\d|X)$/';

        if (preg_match($regex, $isbn)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El codigo ISB no es correcto';
    }
}
