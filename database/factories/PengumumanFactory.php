<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PengumumanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(3, 5)),
            'body'  => $this->faker->paragraph(10),
            'dari'  => "Agus Salim",
            'user_id' => $this->faker->randomDigitNotNull(),
            'pengumuman_category' => mt_rand(1, 2)
        ];
    }
}
