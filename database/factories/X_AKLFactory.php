<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class X_AKLFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kelas_id' => $this->faker->randomDigitNot(1),
            'hadir' => $this->faker->randomDigitNotNull(),
            'sakit' => $this->faker->randomDigitNotNull(),
            'izin' => $this->faker->randomDigitNotNull(),
            'alpa' => $this->faker->randomDigitNotNull()
        ];
    }
}
