<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id_card_number' => str_replace(" ", "", $this->id_card_number),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => "required",
            'last_name' => "required",
            'gender' => "required",
            'birthday' => "required|date",
            'email' => "required|email",
            'password' => "required",
            'password_confirmation' => "required|same:password",
            'address' => "required",
            'zip_code' => "required|numeric",
            'id_card_number' => "required|size:12",
            'id_card_delivered_at' => "required|date",
            'id_card_delivered_in' => "required",
            'origin' => "required",
            'profession' => "required",
            'phone' => "required",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        $requiredErrorMessage = "Ce champs doit être rempli";

        return [
            'first_name.required' => $requiredErrorMessage,
            'last_name.required' => $requiredErrorMessage,
            'gender.required' => $requiredErrorMessage,
            'birthday.required' => $requiredErrorMessage,
            'email.required' => $requiredErrorMessage,
            'password.required' => $requiredErrorMessage,
            'password_confirmation.required' => "Le mot de passe doit être confirmé",
            'password_confirmation.same' => "Mot de passe mal-confirmé",
            'adresse.required' => $requiredErrorMessage,
            'zip_code.required' => $requiredErrorMessage,
            'zip_code.numeric' => "Le code postal doit être un nombre",
            'id_card_number.required' => $requiredErrorMessage,
            'id_card_number.numeric' => "Le numéro du CIN ne doit contenir que des chiffres",
            'id_card_number.size' => "Le numéro du CIN doit contenir éxactement 12 chiffres",
            'id_card_delivered_at.required' => $requiredErrorMessage,
            'id_card_delivered_in.required' => $requiredErrorMessage,
            'origin.required' => $requiredErrorMessage,
            'profession.required' => $requiredErrorMessage,
            'phone.required' => $requiredErrorMessage,
        ];
    }
}
