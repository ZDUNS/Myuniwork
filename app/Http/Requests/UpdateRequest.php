<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required | string |min:3|max:100 | unique:vehicle',
        ];
        [
            'name.required' => 'Lūdzu aizpildiet šo lauku!',
            'name.unique' => 'Šāds ceļojuma veids jau eksistē!',
            'name.min' => 'Ceļojuma veida nosaukumam jāsatur vismaz 3 simboli!',
            'name.max' => 'Ceļojuma veida nosaukumam jāsatur ne vairāk par 100 simboliem!',
        ];
    }
}
