<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RekapAbsenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kelas_id'  => $this->faker->randomDigitNotNull(),
            'hadir'     => $this->faker->randomDigitNotNull(),
            'sakit'     => $this->faker->randomDigitNotNull(),
            'izin'      => $this->faker->randomDigitNotNull(),
            'alpa'      => $this->faker->randomDigitNotNull(),
            'tanggal'   => $this->faker->date('Y-m-d')
        ];
    }
}
