<?php

namespace Database\Factories;

use App\Models\Pieza;
use Illuminate\Database\Eloquent\Factories\Factory;

class PiezaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pieza::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'donante_id'=>$this->faker->randomElement(1,2,3,4,5),
            'nombre'=>$this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'detalle'=>$this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'estado'=>$this->faker->word,
        ];
    }
}
