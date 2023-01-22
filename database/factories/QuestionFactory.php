<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $options = $this->randomOptions();
        return [
            'body' => $this->faker->realText(),
            'options' => $options,
            'answer' => $options[1],
            'type' => 'pre'
        ];
    }

    function randomOptions(){
        return [
            1 => $this->faker->catchPhrase(),
            2 => $this->faker->catchPhrase(),
            3 => $this->faker->catchPhrase(),
            4 => $this->faker->catchPhrase(),
        ];
    }
}
