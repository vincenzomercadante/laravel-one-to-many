<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'label' => 'required|unique:types,label|string|max:30',
            'color' => 'required|unique:types,color|hex_color'
        ];
    }

    public function messages(){
        return[
            'label.required' => 'Label is required',
            'label.string' => 'Label must be a string',
            'label.max' => 'Too long label',
            'label.unique' => 'Label is already used',

            'color.required' => 'Badge Color is required',
            'color.hex_color' => 'Badge Color must be a hexadecimal color',
            'color.unique' => 'Badge Color is already used',

        ];
    }

}
