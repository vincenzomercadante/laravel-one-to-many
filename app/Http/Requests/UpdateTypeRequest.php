<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
            'label' => 'required|string|max:30',
            'color' => 'required|hex_color'
        ];
    }

    public function messages(){
        return[
            'label.required' => 'Label is required',
            'label.string' => 'Label must be a string',
            'label.max' => 'Too long label',
            
            'color.required' => 'Badge Color is required',
            'color.hex_color' => 'Badge Color must be a hexadecimal color',
        ];
    }
}
