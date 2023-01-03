<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            
            'title'=>'required | string |min:3|max:80',
            'description'=>'required | string |min:3|max:255 ',
            'preview_image'=>'nullable| file',
            'image'=>'nullable | file',
            'vehicle_id'=>'required | integer | exists:vehicle,id',
            'place_id'=>'required | integer | exists:places,id',
        ];
    }
}
