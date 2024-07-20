<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'designation'=>'required',
            'prix_achat'=>'required',
            'prix_vente'=>'required',
            'qteStock'=>'required',
            'seuil_alert'=>'required',
            'image'=> 'image|mimes:jpg,png,jpeg',
            'id'=>'required'
        ];
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'designation.required'=>'La designation du produit est requis',
            'prix_achat.required'=>'Le prix d achat est requis !',
            'prix_vente.required'=>'Attention il faut indiqué le prix de vente',
            'qteStock.required'=>'Quantité de stock est requis pour valider le produit',
            'seuil_alert.required'=>'Veuillez remplir le seuil d alerte',
            'image.image'=> 'L image doit etre de type jpeg,jpg,png',
            'id.required'=>'Une erreur c est produite veuillez actualiser la page !'
        ];
    }
}
