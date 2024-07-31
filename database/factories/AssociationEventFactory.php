<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssociationEvent>
 */
class AssociationEventFactory extends Factory
{
   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_ids=User::pluck('id')->toArray();
        return [
        'title'=>fake()->sentence(),
        'description'=>fake()->text(),
        'photo'=>'events_img/1636612872Fambolen-kazo faobe.jpg',
        'starts_at'=>fake()->dateTimeBetween('+0 days','+2 years'),
        'ends_at'=>fake()->dateTimeBetween('+0 days','+2 years'),
        'location'=>fake()->address(),
        'posted_by'=>fake()->randomElement($user_ids),
        ];
    }
}

