<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class   ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message_id'=>Message::all()->random()->id,
            'user_id'=>User::all()->random()->id,
            'body'=>$this->faker->text(),
            'to'=>User::all()->random()->id,
            'status'=>$this->faker->numberBetween(0,1)
        ];
    }
}
