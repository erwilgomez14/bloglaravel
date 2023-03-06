<?php

namespace App\Rules;

use App\Models\Backend\Menu;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class validacionCampoUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($value != '#'){
            $menu = Menu::where($attribute, $value)->get();
            return $menu->isEmpty();
        }
    }
}
