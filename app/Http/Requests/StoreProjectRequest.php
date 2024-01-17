<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','min:3', 'max:200', 'unique:projects'],
            'description' => ['required'],
            'url' => ['nullable'],
            'image'=> ['nullable','image'],
            'technologies' => ['required']
        ];
    }

    public function messages(){
        return [
            'title.unique' => 'Il titolo deve essere univoco',
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo non deve superare i :max caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'image.image' => 'Il file deve essere un immagine',
            'technologies.required' => 'Le tecnologie sono obbligatorie'
        ];
    }
}
