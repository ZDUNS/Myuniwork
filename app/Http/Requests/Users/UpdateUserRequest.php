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
            'username'=>'required|min:5',
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required',
           //'password'=>'required|min:8|max:18',
        ];
        [
            'firstName.required'=>'Lūdzu aizpildiet šo lauku!',
            'lastName.required'=>'Lūdzu aizpildiet šo lauku!',
            'username.required'=>'Lūdzu aizpildiet šo lauku!',
            'username.min'=>'Lietotāja vārdam jāsatur vismaz 5 simboli!',
            'email.required'=>'Lūdzu aizpildiet šo lauku!',

       ];
    }
}
