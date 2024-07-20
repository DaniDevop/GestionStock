<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'required|unique:Users,name',
            'prenom' => 'nullable',
            'email' => 'nullable|email|unique:users,email',
            'profile' => 'nullable|image|mimes:jpg,png,jpeg',
            'password' => 'required',
            'password_verification' => 'required',
            'id' => 'nullable|exists:Users,id',

        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est requis ',
            'email.unique' => 'L email existe déjà dans la base de données',
            'profile.image' => 'Le profile doit etre de type jpeg,jph,png',
            'password.required' => 'Le mot de passe est requis',
            'password_verification' => 'Le mot de passe de confirmation est requis',
            'id.exists' => 'Une erreur c est produite veuillez rafraichir la page !',

        ];
    }
}
