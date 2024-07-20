<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'prenom' => 'nullable',
            'email' => 'nullable|email',
            'profile' => 'nullable|image|mimes:jpg,png,jpeg',
            'id' => 'required|exists:Users,id',

        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est requis ',
            'email.email' => 'L email doit etre de type EX: exemple@gmail.com',
            'profile.image' => 'Le profile doit etre de type jpeg,jph,png',
            'id.exists' => 'Une erreur c est produite veuillez rafraichir la page !',

        ];
    }
}
