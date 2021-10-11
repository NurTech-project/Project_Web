<?php

namespace Database\Factories;

use App\Models\Historia;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Historia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'administrador'=>$this->faker->randomElement([1,2,3,4,5]),
            'imagen'=>$this->faker->imageUrl($width = 640, $heigth = 400),
            'descripcion'=>$this->faker->sentence($nbWords = 4, $variableNbWords = true),
        ];
    }
}
