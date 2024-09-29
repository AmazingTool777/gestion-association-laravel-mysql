<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    private function generateMalagasyPhoneNumber()
    {
        $allowedPrefixes = ["032", "033", "034"];
        $prefix = $allowedPrefixes[array_rand($allowedPrefixes)];

        // Generate 7 random digits
        $randomDigits = '';
        for ($i = 0; $i < 7; $i++) {
            $randomDigits .= mt_rand(0, 9);
        }

        // Combine prefix and random digits
        $phoneNumber = $prefix . $randomDigits;

        return $phoneNumber;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "birthday" => $this->faker->date(),
            "gender" => $this->faker->randomElement(["M", "F"]),
            "address" => $this->faker->address(),
            "zip_code" => "101",
            "origin" => "FOREIGN",
            "id_card" => [
                "id" => "101123459774",
                "delivered_at" => "2020-11-02",
                "delivered_in" => "Antananarivo II",
            ],
            "profession" => "Etudiante",
            "phone" => $this->generateMalagasyPhoneNumber(),
        ];
    }
}
