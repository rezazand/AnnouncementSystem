<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->random()->id,
            'subject'=>$this->faker->title(),
            'body'=>$this->faker->text(),
            'to'=>User::all()->random()->id,
            'status'=>$this->faker->numberBetween(0,1),
        ];
    }
}
