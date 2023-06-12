<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

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
            'name' => ['required', 'min:3', 'max:150', Rule::unique('types')->ignore($this->types)], //con ignore($this->project) non da errore se modifico solo content
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'name.min' => 'Il campo nome deve essere di almeno :min caratteri',
            'name.max' => 'Il campo nome deve essere di massimo :max caratteri',
            'name.unique' => 'Il campo nome deve essere univoco'
        ];
    }
}
