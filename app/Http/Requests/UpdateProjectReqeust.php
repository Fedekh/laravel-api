<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectReqeust extends FormRequest
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
            'title' => ['required', 'min:3', 'max:150', Rule::unique('projects')->ignore($this->project)], //con ignore($this->project) non da errore se modifico solo content
            'content' => 'nullable|string',
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id'],
            'image' => 'nullable'



        ];
    }
    //'title' => ['required','min:3','max:150', Rule::unique('projects')] scritto cosi pero se modifico solo content vede anche il titolo cambiato e da errore


    public function messages()
    {
        return [
            'title.required' => 'Il titolo è richiesto e deve essere lungo almeno 3 caratteri',
            'title.min' => 'Il titolo deve essere lungo almeno :min caratteri',
            'title.max' => 'Il titolo non deve superare :max caratteri',
            'title.unique' => 'Il titolo inserito è già stato utilizzato',
            'type_id' => 'Il tipo di progetto deve essere presente nel database',
            'technologies' => 'La tecnologia deve essere presente nel database'

        ];
    }
}
