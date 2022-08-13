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
            'name'=>$this->faker->sentence,
            'type'=>$this->faker->title(),
            'body'=>$this->faker->text(),
        ];
    }
}
