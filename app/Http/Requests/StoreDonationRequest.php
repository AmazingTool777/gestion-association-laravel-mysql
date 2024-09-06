<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
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
            "mobile_money_name" => "required",
            "amount" => "required|numeric",
            "donation_giver_fullname" => "required",
            "donation_giver_email" => "required|email",
            "donation_giver_phone" => ["required", "regex:/^(32|33|34)\s?(\d\s?){7}$/"],
            "donation_call_id" => "exists:donation_calls,id"
        ];
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        $this->replace(['donation_giver_phone' => "0" . str_replace(" ", "", $this->donation_giver_phone)]);
    }
}
