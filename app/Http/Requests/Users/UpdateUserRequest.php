<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username'=>'required|min:5|max:30',
            'firstName'=>'required|min:3|max:60',
            'lastName'=>'required|min:3|max:60',
            'email'=>'required|min:4|max:190',
           //'password'=>'required|min:8|max:18',
        ];
        [
            'firstName.required'=>'Lūdzu aizpildiet šo lauku!',
            'lastName.required'=>'Lūdzu aizpildiet šo lauku!',
            'username.required'=>'Lūdzu aizpildiet šo lauku!',
            'username.min' => 'Lietotāja vārdam jāsatur vismaz 5 simboli!',
            'username.max' => 'Lietotāja jāsatur ne vairāk par 30 simboliem!',
            'email.required'=>'Lūdzu aizpildiet šo lauku!',
            'email.min' => 'E-pasta adresei jāsatur vismaz 4 simboli!',
            'email.max' => 'E-pasta adresei jāsatur ne vairāk par 190 simboliem!',
            'firstName.min' => 'Vārdam jāsatur vismaz 3 simboli!',
            'firstName.max' => 'Vārdam jāsatur ne vairāk par 60 simboliem!',
            'lastName.min' => 'Uzvārdam jāsatur vismaz 3 simboli!',
            'lastName.max' => 'Uzvārdam jāsatur ne vairāk par 60 simboliem!',

       ];
    }
}
