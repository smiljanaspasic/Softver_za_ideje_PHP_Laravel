<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuggestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> rand(1,10),
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'status' => $this->faker->word(),
            'commented' => $this->faker->boolean,
            'comment' => $this->faker->text()
            
            //
        ];
    }
}
