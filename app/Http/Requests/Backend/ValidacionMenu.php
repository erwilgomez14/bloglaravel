<?php

namespace App\Http\Requests\Backend;

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
            //
            'nombre' =>  'required|max:50| unique:menus,nombre',
            'url' =>  'required|max:100| unique:menus,url', 
            'icono' =>  'nullable|max:50' 
        ];
    }
}
