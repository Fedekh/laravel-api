<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTecnologyRequest extends FormRequest
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
            'name_technologies' => ['required','min:3','max:150', Rule::unique('technologies')], //con ignore($this->project) non da errore se modifico solo content
            
        ];
    }

    public function messages()
    {
        return [
            'name_technologies.required' => 'Il campo nome è obbligatorio',
            'name_technologies.min' => 'Il campo nome deve essere di almeno :min caratteri',
            'name_technologies.max' => 'Il campo nome deve essere di massimo :max caratteri',
            'name_technologies.unique' => 'Tecnologia già esistente, o non hai effettivamente modificto nulla'

        ];
    }
}
