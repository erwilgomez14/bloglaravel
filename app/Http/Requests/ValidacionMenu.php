<?php

namespace App\Http\Requests;

use App\Rules\validacionCampoUrl;
use Illuminate\Foundation\Http\FormRequest;

class ValidacionMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|max:50|unique:menu,nombre',
            'url' => 'required|max:50' ,
            'icono' => 'nullable|max:50'
        ];
    }
}
