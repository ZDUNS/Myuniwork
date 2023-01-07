<?php

namespace App\Http\Requests\Places;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlacesRequest extends FormRequest
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
        return  [
            'name' => 'required | string |min:3|max:100 | unique:places',
        ];
        [
            'name.required'=>'Lūdzu aizpildiet šo lauku!',
            'name.unique'=>'Šāds ceļojuma galamērķis jau eksistē!',
            'name.min'=>'Ceļojuma galamērķim jāsatur vismaz 3 simboli!',
            'name.max'=>'Ceļojuma galamērķim jāsatur ne vairāk par 100 simboliem!',
        ];
}
}
