<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(5),
            'body' => $this->faker->text(100),
            'category_id' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
